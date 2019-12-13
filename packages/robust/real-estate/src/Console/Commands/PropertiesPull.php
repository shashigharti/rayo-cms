<?php


namespace Robust\RealEstate\Console\Commands;
use Illuminate\Support\Str;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingProperty;


class PropertiesPull extends RetsCommands
{
    /**
     * @var string
     */
    protected $signature = 'rws:properties-pull';

    /**
     * @var string
     */
    protected $description = 'Pull Properties from server';


    /**
     * FieldsPull constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected $property_class = [
        'A' => 'Residential Property',
        'B' => 'MultiFamily',
        'C' => 'LotsAndLand',
        'D' => 'CommonInterest',
        'E' => 'Industry',
        'F' => 'Rental',
    ];

    protected $limit = 50;

    public function handle()
    {
        $resources = config('real-estate.data-map.property.properties');
        foreach ($resources as $class => $resource){
            Listing::select('id','uid')
                ->where('class',$this->property_class[$class])
                ->doesnthave('property')
                ->chunk($this->limit,function ($listings) use ($resource,$class){
                    $listing_ids = $listings->pluck('id','uid')->toArray();
                    $query = '(LIST_1=';
                    $query .= implode(',',array_flip($listing_ids));
                    $query .= ')';
                    $fields = implode(',',array_values($resource));
                    $results = $this->rets->Search('Property',$class,$query,['Select'=>$fields,'Limit' =>$this->limit]);
                        foreach ($results as $result){
                            $result = $result->toArray();
                            $data = [];
                            $properties = [];
                            foreach ($resource as $key => $field)
                            {
                                if(isset($result[$field])){
                                    $data[$key] = $result[$field];
                                }
                            }
                            foreach ($data as $key => $property)
                            {
                                if(!in_array($property,['','none','None','Undefined'])){
                                    $properties[$key] = $property;
                                }
                            }
                            $properties_array = [];
                            foreach ($properties as $key => $property){
                                array_push($properties_array,[
                                    'listing_id' => $listing_ids[$data['uid']],'type' => $key,'value' => $property
                                ]);
                            }
                            ListingProperty::insert($properties_array);
                            $this->info('ID : ' . $listing_ids[$data['uid']]);
                        }
                });
        }
        // cant pull 100 data at a time the server will response as bad request

    }
}
