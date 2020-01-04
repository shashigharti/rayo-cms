<?php
namespace App\Console\Commands;

use Robust\RealEstate\Models\Listing;
use Illuminate\Console\Command;
use Robust\RealEstate\Models\ListingProperty;

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
        //in live we already have table as real_estate_listings no need to create new

        $removable = ['id','class','system_price','city_id','zip_id',
            'subdivision_id','county_id','picture_count','created_at','updated_at',
            'listing_id'];
        Listing::chunk(5000,function ($listings) use ($removable){
            foreach ($listings as $listing)
            {
                $listing = json_decode($listing,true);
                $listing_fields = array_keys($listing);
                foreach ($listing_fields as $field)
                {
                    if(
                        $listing[$field] != null
                        && !in_array($listing[$field],['','None','none','undefined'])
                        &&  !in_array($field,$removable)){

                        $property = ListingProperty::create([
                            'listing_id' => $listing['id'],
                            'type' => $field,
                            'value' => $listing[$field],
                            'status' => 1  //1 enabled, 0 disabled
                        ]);
                   }
                }
            }
        });
        \DB::table('real_estate_listing_details')
            ->orderBy('id')
            ->chunk(5000,function ($listings) use ($removable){
            foreach ($listings as $listing)
            {
                $listing = (array) $listing;
                $listing_fields = array_keys($listing);
                foreach ($listing_fields as $field)
                {
                    if(
                        $listing[$field] != null
                        && !in_array($listing[$field],['','None','none','undefined'])
                        &&  !in_array($field,$removable)){
                        $property = ListingProperty::create([
                            'listing_id' => $listing['listing_id'],
                            'type' => $field,
                            'value' => $listing[$field],
                            'status' => 1  //1 enabled, 0 disabled
                        ]);
                    }
                }
            }
        });
    }
}
