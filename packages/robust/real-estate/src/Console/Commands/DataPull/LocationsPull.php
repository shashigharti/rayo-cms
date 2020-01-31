<?php


namespace Robust\RealEstate\Console\Commands\ListingData;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingProperty;


class LocationsPull extends RetsCommands
{
    /**
     * @var string
     */
    protected $signature = 'rws:locations-pull';

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

    protected $limit = 100;

    protected $property_class = [
        'A' => 'Residential Property',
        'B' => 'MultiFamily',
        'C' => 'LotsAndLand',
        'D' => 'CommonInterest',
        'E' => 'Industry',
        'F' => 'Rental',
    ];
    //temporary code for fixing latitude & longitude
    public function handle()
    {
        $setting = settings('real-estate','client');
        $slug = $setting['slug'] ?? null;
        $processed = 0;
        if($slug){
                foreach ($this->property_class as $class => $value){
                    $query = Listing::where('class',$this->property_class[$class])
                                ->whereNull('latitude')->orWhereNull('longitude');
                    $total = $query->count();

                    $query->chunkById($this->limit,function ($listings) use ($class,$processed,$total){
                        $listing_ids = $listings->pluck('id','uid')->toArray();
                        $query = '(LIST_1=';
                        $query .= implode(',',array_flip($listing_ids));
                        $query .= ')';
                        $fields ='LIST_1,LIST_46,LIST_47';
                        $results = $this->rets->Search('Property',$class,$query,['Select'=>$fields,'Limit' =>$this->limit]);
                        foreach ($results as $result) {
                            $result = $result->toArray();
                            Listing::where('uid',$result['LIST_1'])
                                    ->update([
                                       'latitude' => $result['LIST_46'],
                                       'longitude' => $result['LIST_47']
                                    ]);
                            $processed+=1;
                        }
                        $this->info('Total : ' . $total . ' || Processed : ' .$processed);
                    });
                }




            // cant pull 100 data at a time the server will response as bad request
        }
    }
}
