<?php
namespace Robust\RealEstate\Console\Commands;

use Robust\RealEstate\Models\Listing;
use Illuminate\Console\Command;

/**
 * Class UpdateGeoLocations
 * @package App\Console\Commands
 */
class UpdateGeoLocations extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'rws:update-geo-locations';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Update geo locations";

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $listings = Listing::select("real_estate_listings.id", "real_estate_listings.name")
            ->get();

        $count = 0;
        foreach($listings as $listing){
            $address = geocode($listing->name . "FL");

            if($count > 10){
                sleep(5);
            }
            // geocode not found
            if($address['geometry']['location']){
                $listing->update(
                    [
                        'latitude' => $address['geometry']['location']['lat'],
                        'longitude' => $address['geometry']['location']['lng']
                    ]

                );
            }
            $this->info($listing->latitude . "," . $listing->longitude);
            $count++;
        }
    }

}
