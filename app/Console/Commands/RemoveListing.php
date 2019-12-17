<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Robust\RealEstate\Models\City;
use Robust\RealEstate\Models\County;
use Robust\RealEstate\Models\HighSchool;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingImages;
use Robust\RealEstate\Models\ListingProperty;
use Robust\RealEstate\Models\Location;
use Robust\RealEstate\Models\Subdivision;
use Robust\RealEstate\Models\Zip;

class RemoveListing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rws:remove-listings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove unwanted listings other that client requirements';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected $cities = [
        'Boca Raton',
        'Delray Beach',
        'Boynton Beach',
        'Deerfield Beach',
        'West Palm Beach',
        'Palm Beach Gardens',
        'Wellington',
        'Parkland',
        'Highland Beach'
    ];
    protected const RELATION_MAP = [
        'cities' => ['class' => '\Robust\RealEstate\Models\City'],
    ];
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Truncating Listings');
        Listing::truncate();
        $this->info('Done Listings');
        $this->info('Truncating Cities');
        City::truncate();
        $this->info('Done Cities');
        $this->info('Truncating Properties');
        ListingProperty::truncate();
        $this->info('Done Properties');
        $this->info('Truncating Images');
        ListingImages::truncate();
        $this->info('Done Images');
        $this->info('Truncating Location');
        Location::truncate();
        $this->info('Done Location');
        $this->info('Truncating Subdivision');
        Subdivision::truncate();
        $this->info('Done Subdivision');
        $this->info('Truncating Zip');
        Zip::truncate();
        $this->info('Done Zip');
        $this->info('Truncating County');
        County::truncate();
        $this->info('Done');
//        $total = Listing::count();
//        $counter = 0;
//        $removed =0;
//        Listing::chunk(1000,function ($listings) use ($counter,$removed,$total){
//           foreach ($listings as $listing){
//               $counter+=1;
//
//               $city = Location::where('id',$listing->city_id)
//                        ->where('locationable_type',self::RELATION_MAP['cities']['class'])->first();
//               if($city && in_array($city->name,$this->cities) && $listing->system_price > 10000){
//                   $this->info('Matched : ' .$city->name . ' || Price : ' .$listing->system_price);
//               }else{
//                   if($city){
//                       $this->info('Unmatched : ' . $city->name);
//                   }
//                   $removed+=1;
//                   $listing->delete();
//                   ListingProperty::where('listing_id',$listing->id)->delete();
//                   ListingImages::where('listing_id',$listing->id)->delete();
//               }
//               $this->info('Total : ' . $total . ' || Counter : ' .$counter . ' || Removed : ' .$removed);
//           }
//        });
    }
}
