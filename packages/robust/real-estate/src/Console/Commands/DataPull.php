<?php


namespace Robust\RealEstate\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingImages;
use Robust\RealEstate\Models\ListingProperty;

/**
 * Class DataPull
 * @package Robust\RealEstate\Console\Commands
 */
class DataPull extends RetsCommands
{
    /**
     * @var string
     */
    protected $signature = 'rws:data-pull';

    /**
     * @var string
     */
    protected $description = 'Pull Data from server';

    /**
     * DataPull constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected $properties = [

    ];
    /**
     * @var array
     */
    protected $property_class = [
        'A' => 'Residential Property',
        'B' => 'MultiFamily',
        'C' => 'LotsAndLand',
        'D' => 'CommonInterest',
        'E' => 'Industry',
        'F' => 'Rental',
    ];
    /**
     * @var array
     */
    protected $integer_fields = [
        'total_finished_area',
        'system_price',
        'picture_count',
        'year_built',
        'bedrooms',
        'baths_full',
        'days_on_mls',
        'asking_price'
    ];
    protected $listing_fillable = [
        'name',
        'slug',
        'uid',
        'mls_number',
        'class',
        'area',
        'sub_area',
        'borough_id',
        'system_price',
        'asking_price',
        'address_number',
        'address_street',
        'city',
        'zip',
        'state',
        'subdivision',
        'county',
        'elementary_school',
        'high_school',
        'middle_school',
        'picture_count',
        'picture_status',
        'input_date',
        'baths_full',
        'bedrooms',
        'status',
     ];
    protected $maps = [
        'area' => 'area_id',
        'city' => 'city_id',
        'county' => 'county_id',
        'zip' => 'zip_id',
        'elementary_school' =>'elementary_school_id',
        'high_school' => 'high_school_id',
        'middle_school' => 'middle_school_id'
    ];
    protected $mapping = [
        'city' => 'Robust\RealEstate\Models\City',
        'county' => 'Robust\RealEstate\Models\County',
        'area' => 'Robust\RealEstate\Models\Area',
        'elementary_school' => 'Robust\RealEstate\Models\ElementarySchool',
        'middle_school' => 'Robust\RealEstate\Models\MiddleSchool',
        'high_school' => 'Robust\RealEstate\Models\HighSchool',
        'zip' =>  'Robust\RealEstate\Models\Zip',
    ];
    /**
     * @var int
     */
    protected $limit = 2000; //how much data we get in single call

    /**
     * @throws \PHRETS\Exceptions\CapabilityUnavailable
     * @throws \PHRETS\Exceptions\MissingConfiguration
     */
    public function handle()
    {
        $resources = config('real-estate.data-map.property.listing');
        foreach ($resources as $class => $resource)
        {
            $processed = 0;
            $created = 0;
            $updated = 0;
            $total = 0;
            $offset = 0;
            $fields = implode(',',array_values($resource));
            $date = Carbon::now()->subDay(100)->toAtomString(); //only accepts atom format
            dump($date);
            $query = '*'; //this is for accepting all data with out any condition

            $query = '(LIST_132='.$date .'+)'; // this is according to input date
            $results = $this->rets->Search('Property',$class,$query,['Select'=>'LIST_1','Limit' =>1]);

            $total = $results->getTotalResultsCount();
            dump($total);
            do {
                $results = $this->rets->Search('Property',$class,$query,['Limit' =>$this->limit,'Select' => $fields,'Offset' => $offset * $this->limit]);
                $offset+=1;
                foreach ($results as $result){
                    $result = $result->toArray();
                    $data = [];
                    $listing_data = [];

                    //result to data with keys
                    foreach ($resource as $key => $field)
                    {
                        if(isset($result[$field])){
                            $data[$key] = $result[$field];
                        }
                    }
                    //listing data
                    foreach ($this->listing_fillable as $field){
                        if(isset($data[$field])){
                            $listing_data[$field] = $data[$field];
                        }
                    }
                    // add id
                    foreach ($listing_data as $key => $data)
                    {
                        if(isset($this->mapping[$key])){
                            if(!in_array($data,['','none','None','Undefined'])){
                                $listing_data[$this->maps[$key]] = $this->mapping[$key]::where('slug',Str::slug($data))->first()->id;
                            }
                        }
                    }
                    //check for integer fields and convert
                    foreach ($this->integer_fields as $field){
                        if(isset($listing_data[$field])){
                            $listing_data[$field] = $this->changeToInt($listing_data[$field]);
                        }
                    }
                    //convert values like class A
                    $listing_data['class'] = $this->changePropertyClass($listing_data['class']);
                    $listing = Listing::updateOrCreate(['uid' => $listing_data['uid']],$listing_data);

                    if($listing->wasChanged()){
                        $updated+=1;
                    }
                    if($listing->wasRecentlyCreated){
                        $created+=1;
                    }
                    $processed+=1;
                    $info = 'Total count : ' .$total .' || ' .
                        'Updated Count : ' .$updated .' || ' .
                        'Created Count : ' .$created . '||
                     Resource : Property || Class : '.$class . ' || Total Images : ' . $listing->picture_count . ' || Offset : ' .$offset * $this->limit;
                    $this->info($info);
                }
            } while($processed != $total);
        }


    }

    /**
     * @param $data
     * @return mixed
     */
    public function changePropertyClass($data)
    {
        return $this->property_class[$data];
    }

    /**
     * @param $data
     * @return int
     */
    public function changeToInt($data)
    {
        return (int) $data;
    }
}
