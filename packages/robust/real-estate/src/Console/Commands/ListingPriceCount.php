<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Repositories\Admin\BannerRepository;
use Robust\RealEstate\Models\Subdivision;
use Robust\RealEstate\Repositories\Website\ListingRepository;
use Robust\RealEstate\Repositories\Website\LocationRepository;

/**
 * Class ListingPriceCount
 * @package Robust\RealEstate\Console\Commands
 */
class ListingPriceCount extends Command
{
    /**
     * @var BannerRepository
     */
    protected $model;
    /**
     * @var ListingRepository
     */
    protected $listing;
    /**
     * @var string
     */
    protected $signature = 'rws:banner-property-count';
    /**
     * @var string
     */
    protected $description = 'Generates counts of listings according to price count & city';
    /**
     * ListingPriceCount constructor.
     * @param BannerRepository $model
     * @param ListingRepository $listing
     */
    public function __construct(BannerRepository $model, ListingRepository $listing, LocationRepository $location)
    {
        parent::__construct();
        $this->model = $model;
        $this->listing = $listing;
        $this->location = $location;
    }

    protected $maps = [
      'cities' => 'city_id',
      'zips' => 'zip_id',
      'counties' => 'county_id'
    ];

    protected $tabs_maps = [
      'waterfront' => [
          'type' => 'waterfront',
          'value' => 'Yes'
      ],
      'condos' => [
          'type' => 'property_type',
          'value' => 'Condo/Coop'
      ],
      'hopa' => [
          'type' => 'hopa',
          'value' => 'Yes-Verified'
      ],
      'communities' => [
          'type' => 'communities',
          'value' => 'Yes'
      ],
    ];

    public function handle()
    {
        $blocks = $this->model->where('template', 'single-col-block')->get();
        foreach ($blocks as $block) {
            $properties = json_decode($block->properties, true);
            $location = $properties['location'];
            $type = $properties['location_type'];
            if ($location != '') {
                $properties['property_counts'] = [];    
                $field = $this->maps[$type];
                $result = \DB::select("select min(system_price) as min, max(system_price) as max from real_estate_listings where $field = $location"); 
                $prices = generate_price_ranges($result[0]->min, $result[0]->max);
                $properties['prices'] = $prices;
                foreach ($prices as $key => $price) {
                    $system_price = explode('-', $price);
                    if(count( $system_price ) > 1){
                        $properties['property_counts'][$price] = $this->listing
                        ->getListings()
                        ->whereLocation([ $type => $location ])
                        ->wherePriceBetween($system_price)
                        ->count();
                    }else{
                        $system_price = explode('>', $price);
                        $properties['property_counts'][$price] = $this->listing
                        ->getListings()
                        ->whereLocation([ $type => $location ])
                        ->where('system_price', '>', $system_price[0])
                        ->count();
                    }
                    
                }
                $block->update(['properties' => json_encode($properties)]);
                
            }
            $tabs = $properties['sub_areas'];
            $properties['tabs'] = [];
            $location = 136;
            foreach ($tabs as $tab) {
                $properties['tabs'][$tab] = [];
                if (isset($this->tabs_maps[$tab])) {
                    $result = \DB::select("select min(system_price) as min, max(system_price) as max from real_estate_listings where $field = $location"); 
                    $prices = generate_price_ranges($result[0]->min, $result[0]->max);
                    foreach ($prices as $price) {
                        $field = $this->maps[$type];
                        $system_price = explode('-', $price);
                        $properties['tabs'][$tab][$price] = $this->listing->getListings()
                            ->whereLocation([ $type => $location ])
                            ->whereHas('property', function ($query) use ($tab){
                                $query->where('type', $this->tabs_maps[$tab])
                                    ->where('value', $this->tabs_maps[$tab]);
                            })->count();
                    }
                }
            }
            $block->update(['properties' => json_encode($properties)]);
        }
    }
}