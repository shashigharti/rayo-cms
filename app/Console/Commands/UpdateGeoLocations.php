<?php
namespace App\Console\Commands;

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

        foreach($listings as $listing){
            $properties = $listing->property()
            ->where(function($query) use ($listing){
                $query->where('type', 'latitude')
                ->where('value', '!=', '')
                ->where('listing_id', $listing->id);
            })
            ->orWhere(function($query) use ($listing){
                $query->where('type', 'longitude')
                ->where('value', '!=', '')
                ->where('listing_id', $listing->id);
            })            
            ->get();
            foreach( $properties as $property ){                
                $listing->update(
                    [ $property->type => $property->value ]
                );
                $this->info($property->type . "," . $property->value);
            }
        }
    }
       
}
