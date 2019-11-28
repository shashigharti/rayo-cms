<?php
namespace App\Console\Commands;

use Robust\RealEstate\Models\Listing;
use Illuminate\Console\Command;
use Robust\RealEstate\Models\ListingProperty;
use Robust\RealEstate\Models\ListingDetail;

/**
 * Class UserAlert
 * @package App\Console\Commands
 */
class MigrateData extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'migrate:listing-details';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Migrate Old Tables to New Structure; This command will be removed";


    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {        

        $listings = \DB::table('listings')
        ->where('id','<', 7275)
        ->get()->toArray();
        foreach($listings as $key => $listing){   
            $listing = json_decode(json_encode($listing), true);
            $listing_fields =  array_keys($listing);      
            Listing::create($listing);
            foreach ($listing_fields as $field){
                ListingProperty::create([
                    'listing_id' => $listing['id'],
                     'type' => $field, 
                     'value' => $listing[$field],
                     'status' => 1  //1 enabled, 0 disabled
                     ]);           
            }
        }       
        $listing_details = \DB::table('listing_details')
        ->where('listing_id','<', 7275)
        ->get()->toArray();

        foreach($listing_details as $key => $listing_detail){            
            $listing_detail = json_decode(json_encode($listing_detail), true);
            $listing_details_fields = array_keys($listing_detail);
            ListingDetail::create($listing_detail);
            foreach ($listing_details_fields as $field){
                ListingProperty::updateOrCreate([
                    'listing_id' => $listing_detail['listing_id'],
                    'type' => $field, 
                    'value' => $listing_detail[$field],
                    'status' => 1  //1 enabled, 0 disabled
                    ]);           
            }
        }       
    }
}
