<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class FixLocations
 * @package App\Console\Commands
 */
class FixLocations extends Command
{
    /**
     * Fix locations
     * Example: rws:fix-locations
     * @var string
     */
    protected $signature = 'rws:fix-locations';

    /**
     * The console command description.
     * @var string
     */
    protected $description = "Fix Locations";


    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $this->info('Fixing Subdivisions');  
        $listings = \DB::table('real_estate_listings')->get(); 
        foreach($listings as $listing){
            $subdivision = \DB::table('real_estate_subdivisions')
            ->where('id', $listing->subdivision_id)
            ->update([
                'city_id' => $listing->city_id,
                'zip_id' => $listing->zip_id,
                'county_id' => $listing->county_id,
                'area_id' => $listing->area_id
            ]);
        }
       
    }
}
