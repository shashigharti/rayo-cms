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

    public function handle()
    {
        $configs = config('real-estate.frw');
        $location_maps = array_flip($configs['location_maps']);
        $blocks = $this->model->where('template', 'single-col-block')->get();
        foreach ($blocks as $block) {
            $properties = json_decode($block->properties, true);
            $this->info('Starting ' . $properties['header']);
            $price_settings = $properties['price_settings'] ?? [];

            if(isset($properties['url'])){
                $url = $properties['url'];
                $prices = $this->getPriceRange($price_settings);
                $parsed_url = parse_url($url,PHP_URL_QUERY);
                parse_str($parsed_url,$queries);
                $location = Location::where('slug',$queries['location'])
                    ->where('locationable_type',$location_maps[$queries['location_type']])
                    ->first();
                $other_queries = array_diff_key($queries,array_flip(['location','location_type']));
                foreach ($prices as $price){
                    $this->info($price);
                    $query = Listing::where($this->maps[$queries['location_type']],$location->id)
                            ->where('status',settings('real-estate','active'));
                    $price_range = explode('-',$price);
                    if(count($price_range) > 1){
                        $query = $query->whereBetween('system_price',$price_range);
                        $properties['prices'][$price] = $query->count();

                    }else {
                        $price_range = explode('>', $price_range[0]);
                        $query = $query->where('system_price', '<', $price_range[0]);
                        $properties['prices'][$price] = $query->count();
                    }

                    //need to refactor this taking too long
//                    foreach ($other_queries as $tab => $value){
//                        $properties['tabs_data'][$tab][$price] = $query
//                            ->whereIn('real_estate_listings.id',function ($q) use ($tab,$value){
//                                $q->from('real_estate_listing_properties')
//                                    ->select('real_estate_listing_properties.listing_id')
//                                    ->where('type',$tab)
//                                    ->where('value',$value);
//                            })->count();
//                    }
                }
            }
            $this->info('Ending ' . $properties['header']);
            $block->update(['properties' => $properties]);
        }
    }

    public function getPriceRange($price_settings)
    {
        $settings = settings('real-estate');
        //in case of empty data
        $data = isset($settings['data']) ? $settings['data'] : [];
        $min_price = $price_settings['min'] ?? $data['prices'][0] ?? config('rws.application.price.min');
        $max_price = $price_settings['max'] ?? $data['prices'][1] ?? config('rws.application.price.max');
        $increment = $price_settings['increment'] ?? $data['increments'][0] ?? config('rws.application.price.increment');
        return generate_price_ranges($min_price,$max_price,$increment);
    }
}
