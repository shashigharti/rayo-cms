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

    protected $limit = 1000;

    public function handle()
    {
        // cant pull 100 data at a time the server will response as bad request
        $listings_chunked = Listing::select('id','uid')->doesnthave('property')->get()->chunk(50);
        foreach ($listings_chunked as $listings){
            $listing_ids = [];
            $query = '(LIST_1=';
            foreach ($listings as $listing){
               $listing_ids[$listing->uid] = $listing->id;
               if($query !== '(LIST_1='){
                   $query .= ',';
               }
                $query .=  $listing->uid;
            }
            $query .= ')';
            $resource = config('real-estate.data-map.property.properties.A');
            $fields = implode(',',array_values($resource));
            $results = $this->rets->Search('Property','A',$query,['Select'=>$fields,'Limit' =>50]);
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
                foreach ($properties as $key => $property){
                    ListingProperty::updateOrCreate(
                        ['listing_id' =>$listing_ids[$data['uid']],'type' => $key],
                        [
                            'listing_id' => $listing_ids[$data['uid']],'type' => $key,'value' => $property
                        ]
                    );
                    $this->info('ID : ' . $listing_ids[$data['uid']] . ' || Type : '.$key . ' || Value : ' . $property);
                }
            }
        }






    }
}
