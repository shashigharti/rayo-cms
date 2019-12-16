<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\Banners\Repositories\BannerRepository;
use Robust\RealEstate\Models\Subdivision;
use Robust\RealEstate\Repositories\Website\ListingRepository;


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
    public function __construct(BannerRepository $model, ListingRepository $listing)
    {
        parent::__construct();
        $this->model = $model;
        $this->listing = $listing;
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
      ]
    ];
    /**
     *
     */
    public function handle()
    {
        $blocks = $this->model->where('template', 'single-col-block')->get();
        foreach ($blocks as $block) {
            $properties = json_decode($block->properties, true);
            $location = $properties['location'];
            $prices = $properties['prices'];
            $type = $properties['location_type'];
            if ($location != '' && $prices != '') {
                $properties['property_counts'] = [];
                foreach ($prices as $key => $price) {
                    $properties['property_counts'][$price] = $this->listing
                        ->getListingByPrice($this->maps[$type], $location, $price)
                        ->count();
                }
                $block->update(['properties' => json_encode($properties)]);
            }
            $tabs = $properties['sub_areas'];
            $properties['tabs'] = [];
            $location = 136;
            foreach ($tabs as $tab) {
                $properties['tabs'][$tab] = [];
                if (isset($this->tabs_maps[$tab])) {
                    foreach ($prices as $price) {
                        $properties['tabs'][$tab][$price] = $this->listing->getListingByPrice($this->maps[$type], $location, $price)
                            ->whereHas('property', function ($query) use ($tab){
                                $query->where('type', $this->tabs_maps[$tab])
                                    ->where('value', $this->tabs_maps[$tab]);
                            })->count();
                    }
                }

//                if($tab == 'communities'){
//                    $communities = $this->listing->getCommunities($this->maps[$type],$location);
//                    foreach ($communities as $community){
//                        $name = Subdivision::where('id',$community)->first()->name;
//                        $properties['tabs'][$tab][$name] = $this->listing->getCommunityPrice($community)->count();
//                    }
//                }
            }
            $block->update(['properties' => json_encode($properties)]);
        }
    }
}
