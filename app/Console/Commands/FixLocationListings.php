<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Class UpdateLocations
 * @package App\Console\Commands
 */
class FixLocationListings extends Command
{
    /**
     * Update locations
     * Example: rws:fix-listings-locations
     * @var string
     */
    protected $signature = 'rws:fix-listings-locations';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Fix Location Listings";

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $this->info('Update Locations');
        $fields = [
            'area_id',
            'sub_area_id',
            'borough_id',
            'city_id',
            'zip_id',
            'subdivision_id',
            'county_id',
            'elementary_school_id',
            'high_school_id',
            'middle_school_id',
            'school_district_id'
        ];
        DB::table('real_estate_listing_location')->truncate();
        $this->info('truncated');
        DB::table('real_estate_listings')->orderBy('created_at')->chunk(1000, function ($listings) use ($fields) {
            $relations = [];
            foreach ($listings as $listing) {
                foreach($fields as $field){
                    if($listing->{$field} != ''){
                        $relations[] = [
                            'listing_id' => $listing->id,
                            'location_id' => $listing->{$field},
                            'created_at' => now(),
                            'updated_at' => now(),

                        ];
                    }
                }
            }
            DB::table('real_estate_listing_location')->insert($relations);
            $this->info('1000 updated');
        });
    }
}
