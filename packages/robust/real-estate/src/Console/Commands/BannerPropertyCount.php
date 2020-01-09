<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\Location;
use Robust\RealEstate\Repositories\Admin\BannerRepository;
use Robust\RealEstate\Models\Subdivision;
use Robust\RealEstate\Repositories\Website\ListingRepository;
use Robust\RealEstate\Repositories\Website\LocationRepository;

class BannerPropertyCount extends Command
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

    protected const Class_Mapping = [
        'Robust\RealEstate\Models\City' => 'city_id',
        'Robust\RealEstate\Models\County' => 'county_id',
        'Robust\RealEstate\Models\Area' => 'area_id' ,
        'Robust\RealEstate\Models\ElementarySchool' => 'elementary_school_id',
        'Robust\RealEstate\Models\MiddleSchool' => 'middle_school_id' ,
        'Robust\RealEstate\Models\HighSchool' => 'high_school_id',
        'Robust\RealEstate\Models\Zip' => 'zip_id' ,
        'Robust\RealEstate\Models\Subdivision' => 'subdivision_id',
        'Robust\RealEstate\Models\SchoolDistrict' => 'school_district_id',
    ];

    public function handle()
    {
        $blocks = $this->model->where('template', 'single-col-block')->get();
        $settings = settings('real-estate');
        //in case of empty data
        $data = isset($settings['data']) ? $settings['data']['prices'] : [];
        //in case we dont have price range set
        $prices = generate_price_ranges(isset($data[0]) ? $data[0] : null, isset($data[1]) ? $data[1] : null);
        foreach ($blocks as $block) {
            $properties = json_decode($block->properties, true);
            $slug = isset($properties['locations'][0]) ? $properties['locations'][0] : null;
            if($slug){
                $location = Location::where('slug',$slug)->first();
                $query =  $this->listing->getListings()
                          ->where(self::Class_Mapping[$location->locationable_type] , $location->id);
                foreach ($prices as $price)
                {
                    $price_range = explode('-',$price);
                    if(count($price_range) > 1){
                        $properties['prices'][$price] = $query->wherePriceBetween($price_range)->count();
                    }else{
                        $price_range = explode('>', $price);
                        $properties['prices'][$price] = $query->where('system_price', '>', $price_range[0])->count();
                    }
                }
                foreach ($properties['tabs'] as $tab) {
                    $properties['tabs_data'][$tab] = [];
                    if (isset($this->tabs_maps[$tab])) {
                        foreach ($prices as $price) {
                            $properties['tabs_data'][$tab][$price] = $query
                                ->whereHas('property', function ($query) use ($tab){
                                    $query->where('type', $this->tabs_maps[$tab])
                                        ->where('value', $this->tabs_maps[$tab]);
                                })->count();
                        }
                    }else if($tab === 'neighbourhood'){
                        //for subdivisions/neighbourhood
                        $subdivisions = Subdivision::where(self::Class_Mapping[$location->locationable_type],$location->id)
                                        ->get();
                        foreach ($subdivisions as $subdivision){
                            //get location id
                            $location = Location::where('locationable_type','Robust\RealEstate\Models\Subdivision')
                                        ->where('locationable_id',$subdivision->id)
                                        ->first();

                            if($location){
                                $properties['tabs_data'][$tab][$location->slug] = Listing::where('subdivision_id',$location->id)
                                            ->count();
                            }
                        }

                    }else if($tab === 'acreages'){
                        $acres_range = ['0-5','6-10','11-15','16-20'];

                        foreach ($acres_range as $acre){
                            $acres = explode('-',$acre);
                            $properties['tabs_data'][$tab][$acre] = $query
                                ->whereHas('property', function ($query) use ($acres){
                                    $query->where('type', 'acres')
                                        ->whereBetween('value', $acres);
                                })->count();
                        }
                    }
                }
            }
            $block->update(['properties' => $properties]);
        }
    }
}
