<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
/**
 * Class UpdateLocations
 * @package App\Console\Commands
 */
class UpdateLocations extends Command
{
    /**
     * Update locations
     * Example: rws:update-locations
     * @var string
     */
    protected $signature = 'rws:update-locations';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Update Locations";
    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $this->info('Update Locations');  
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
