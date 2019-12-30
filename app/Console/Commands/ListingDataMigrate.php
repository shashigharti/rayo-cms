<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ListingDataMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rws:migrate-listing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    protected $mapping = [
        'name' => 'listing_name',
        'slug' => 'listing_slug',
        'uid' => 'uid',
        'mls_number' => 'mls_number',
        'class' => 'class',
        'area_id' => 'area',
        'borough_id' => 'borough',
        'system_price' => 'system_price',
        'asking_price' => 'asking_price',
        'address_number' => 'address_number',
        'address_street' => 'address_street',
        'city_id' => 'city',
        'zip_id' => 'zip',
        'state' => 'state',
        'subdivision_id' =>'subdivision',
        'county_id' => 'county',
        'elementary_school_id' => 'elem_school',
        'high_school_id' => 'high_school',
        'middle_school_id' => 'middle_school',
        'picture_count' => 'picture_count',
        'input_date' => 'input_date',
        'baths_full' => 'baths_full',
        'bedrooms' => 'bedrooms',
        'status' => 'status',
    ];

    protected $classes = [
        'city_id' => '\Robust\RealEstate\Models\City',
        'county_id' => '\Robust\RealEstate\Models\County',
        'area_id' => '\Robust\RealEstate\Models\Area',
        'elementary_school_id' => '\Robust\RealEstate\Models\ElementarySchool',
        'middle_school_id' => '\Robust\RealEstate\Models\MiddleSchool',
        'high_school_id' => '\Robust\RealEstate\Models\HighSchool',
        'zip_id' =>  '\Robust\RealEstate\Models\Zip',
        'subdivision_id' =>  '\Robust\RealEstate\Models\Subdivision',
    ];
    public function handle()
    {
        DB::table('real_estate_listings')->truncate();
        DB::table('real_estate_listing_properties')->truncate();
        DB::table('real_estate_listing_images')->truncate();
        $active_cities = DB::connection('mysql2')
            ->table('cities')
            ->where('frontpage',0)->get()->pluck('name');
        $fields = array_values($this->mapping);
        $count = 0;
        $total = DB::connection('mysql2')->table('listings')->whereIn('city',$active_cities)->count();
        //get data from different database
        DB::connection('mysql2')->table('listings')
            ->whereIn('city',$active_cities)
            ->chunkById(1000,function ($listings) use ($fields,$count,$total){
            foreach ($listings as $listing){
                DB::connection()->enableQueryLog();
                $start_time = microtime(true);
                $properties_count = 0;
                $images_count = 0;
                $results = (array) $listing;
                $listing_data = [];
                $listing_properties = [];
                //separate listing data & properties
                foreach ($results as $key => $result){
                    $index = array_search($key,$this->mapping);
                    if(in_array($key,$fields) && $index){
                        $listing_data[$index] = $result;
                    }else{
                        //add properties to array
                        if($result != null){
                            $data = [
                                $key => $result
                            ];
                            array_push($listing_properties,$data);
                        }

                    }
                }
                //listing data add id for locations

                foreach ($this->classes as $key => $class){
                    $map =  $class::where('slug',Str::slug($listing_data[$key]))->first();
                    $map_id = $map ? $map->id : $class::create([
                        'name' => $listing_data[$key],
                        'slug' => Str::slug($listing_data[$key])
                    ])->id;
                    $location = DB::table('real_estate_locations')->where(['location_id' => $map_id,'locationable_type' => $class])->first();
                    $listing_data[$key] = $location ? $location->id : DB::table('real_estate_locations')->insertGetId([
                        'name' => $listing_data[$key],
                        'slug' => Str::slug($listing_data[$key]),
                        'location_id' => $map_id,
                        'locationable_type' => $class
                    ]);
                }
                $listing_id = DB::table('real_estate_listings')->insertGetId($listing_data); //insert into listing table
                //get listing details
                $listing_details = DB::connection('mysql2')->table('listing_details')->where('id',$listing->id)->first();
                $listing_details = (array) $listing_details;
                foreach ($listing_details as $key => $detail){
                    if($detail != null && !in_array($detail,['','0','None','none','Undefined'])){
                        $data = [
                          $key => $detail
                        ];
                        array_push($listing_properties,$data);
                    }
                }
                //push to properties table
                $props_array = [];
                foreach ($listing_properties as $property)
                {
                    foreach ($property as $key => $value){
                        if(!in_array($key,['id','listing_id','created_at','updated_at'])){
                            $props = [
                                'listing_id' => $listing_id,
                                'type' => $key,
                                'value' =>$value
                            ];
                            array_push($props_array,$props);
                            $properties_count+=1;
                        }
                    }
                }
                DB::table('real_estate_listing_properties')->insert($props_array);
                //get images
                $images = DB::connection('mysql2')->table('listing_images')->where('listing_id',$listing->uid)->get();
                $images_array = [];
                foreach ($images as $image)
                {
                    $image = (array) $image;
                    if(!$image['type']){
                        $image['type'] = 'image';
                    }
                    $image['url'] = $image['listing_url'];
                    $image['listing_id'] = $listing_id;
                    unset($image['listing_url']);
                    //insert into images table
                    array_push($images_array,$image);
                    $images_count+=1;
                }
                DB::table('real_estate_listing_images')->insert($images_array);
                $count+=1;
                $end_time = microtime(true);
                $execution_time = ($end_time - $start_time);
                $this->info('Total Processed : ' .$count .
                            ' || Total Listings : ' .$total .
                            ' || Total Properties : ' .$properties_count .
                            ' || Total Images : '.$images_count .
                            ' || Execution Time : ' . $execution_time);
                if($images_count > 0){
                    DB::table('real_estate_listings')->where('id',$listing_id)->update([
                        'picture_status' => 1
                    ]);
                }

                if($properties_count > 0){
                    DB::table('real_estate_listings')->where('id',$listing_id)->update([
                        'properties_status' => Carbon::now()
                    ]);
                }

                $queries = DB::getQueryLog();
                Log::info($queries);
            }
        });
    }
}
