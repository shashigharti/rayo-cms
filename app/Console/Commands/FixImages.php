<?php
namespace App\Console\Commands;

use Robust\RealEstate\Models\Listing;
use Illuminate\Console\Command;
use Robust\RealEstate\Models\ListingProperty;
use Robust\RealEstate\Models\ListingDetail;

/**
 * Class FixImages
 * @package App\Console\Commands
 */
class FixImages extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'rws:fix-images';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Migrate Old Tables for Images to New Structure; This command will be removed";


    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {

        $listings = \DB::table('real_estate_listings')
        ->get();

        foreach($listings as $key => $listing){
            $this->info($key);
            \DB::table('real_estate_listing_images')
            ->where('listing_id', $listing->server_listing_id)
            ->update(['listing_id' => $listing->id]);
        }
    }
}
