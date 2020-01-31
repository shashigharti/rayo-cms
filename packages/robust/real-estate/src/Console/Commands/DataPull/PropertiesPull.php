<?php


namespace Robust\RealEstate\Console\Commands\DataPull;
use Carbon\Carbon;
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
        $setting = settings('real-estate','client');
        $slug = $setting['slug'] ?? null;
        if($slug){
            $resources = config('real-estate.'. $slug .'.data-map.property.properties');
            foreach ($resources as $class => $resource){
                $query = Listing::where('class',$this->property_class[$class])
                    ->whereNull('properties_status');
                $total = $query->count();
                $processed = 0;

                $query->chunkById($this->limit,function ($listings) use ($resource,$class,$processed,$total){
                    $processed+=count($listings);
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
                        //generate acres from lot size
                        $acres = 0;
                        if(isset($properties['lot_size'])){
                            $acres = floatval($properties['lot_size']) / 43560;
                            $properties['acres'] = round($acres,3);
                        }
                        $properties_array = [];
                        foreach ($properties as $key => $property){
                            array_push($properties_array,[
                                'listing_id' => $listing_ids[$data['uid']],'type' => $key,'value' => $property
                            ]);
                        }
                        ListingProperty::insert($properties_array);
                        Listing::whereIn('id',array_values($listing_ids))
                            ->update(['properties_status' => Carbon::now()]);

                    }
                    $this->info('Total : ' . $total . ' Class : ' .$class . ' || Processed : ' .$processed);
                });

            }
            // cant pull 100 data at a time the server will response as bad request
        }
    }
}
