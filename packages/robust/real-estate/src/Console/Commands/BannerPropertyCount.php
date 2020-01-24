<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\Location;
use Robust\RealEstate\Repositories\Admin\BannerRepository;
use Robust\RealEstate\Repositories\Website\ListingRepository;
use Robust\RealEstate\Repositories\Website\LocationRepository;

/**
 * Class BannerPropertyCount
 * @package Robust\RealEstate\Console\Commands
 */
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

    /**
     * @var array
     */
    protected $maps = [
        'cities' => 'city_id',
        'zips' => 'zip_id',
        'counties' => 'county_id',
        'subdivisions' => 'subdivision_id'
    ];

    /**
     *
     */
    public function handle()
    {
        $settings = settings('real-estate');
        $banners = $this->model->where('template', 'single-col-block')->get();

        foreach ($banners as $banner) {
            $properties = json_decode($banner->properties, true);
            $this->info('Starting ' . $properties['header']);

            $properties = json_decode($banner->properties, true);
            $qBuilder = new Location();
            $qListingBuilder = new Listing();

            foreach ($properties['locations'] as $key => $location_slugs) {
                $qBuilder = $qBuilder
                    ->where('locationable_type', get_class_by_location_type($key))
                    ->whereIn('slug', $location_slugs);
                $locations[$key] = $qBuilder->get();
            }

            foreach ($locations as $location_type => $location) {
                $ids = $location->pluck('id');
                $qListingBuilder = $qListingBuilder
                    ->where($this->maps[$location_type], $ids)
                    ->leftJoin('real_estate_listing_properties', 'real_estate_listing_properties.listing_id', 'real_estate_listings.id')
                    ->whereBetween('input_date', [date('Y-m-d', strtotime($settings['data_age'])), date('Y-m-d')]);
                if (isset($properties['attributes'])) {
                    $params = $properties['attributes'];
                    foreach ($params as $key => $param) {
                        $qListingBuilder = $qListingBuilder->where(function ($query) use ($key, $param) {
                            $query->where('real_estate_listing_properties.type', '=', $key)
                                ->whereIn('real_estate_listing_properties.value', $param);
                        });
                    }
                }
                $properties['prices'] = $this->updateBannerPrice($qListingBuilder, $properties['prices']);
                if(isset($properties['tabs']))
                    $properties['tabs'] = $this->updateTabsRanges($qListingBuilder, $properties['tabs']);
            }
        }
    }

    /**
     * @param $qListingBuilder
     * @param $tabs
     * @return mixed
     */
    public function updateTabsRanges($qListingBuilder, $tabs)
    {
        foreach ($tabs as $key => $tab) {
            if (isset($tab['conditions'])) {
                $conditions = $tab['conditions'];
                $qListingBuilder = $qListingBuilder->where(function ($query) use ($key, $conditions) {
                    foreach ($conditions as $condition) {
                        $query->orWhere(function ($query) use ($key, $condition) {
                            $query->where('real_estate_listing_properties.type', '=', $condition['property_type'])
                                ->whereIn('real_estate_listing_properties.value', $condition);
                        });
                    }

                });

            }

            if (isset($tab['prices'])) {
                $price_ranges = $tab['prices'];
                foreach ($price_ranges as $price_range_key => $price_range) {
                    $qBuilder = clone $qListingBuilder;
                    if ($price_range['max'] != '') {
                        $count = $qBuilder
                            ->whereBetween('system_price', [$price_range['min'], $price_range['max']])
                            ->count();
                        $price_ranges[$price_range_key]['count'] += $count;
                    } else {
                        $count = $qBuilder
                            ->where('system_price', '>', $price_range['min'])
                            ->count();
                        $price_ranges[$price_range_key]['count'] += $count;
                    }

                    if ($price_ranges[$price_range_key]['count'] > 0)
                        $this->info(implode(',', [$price_range['min'], $price_range['max'], $price_ranges[$price_range_key]['count']]));
                }
                $tabs[$key]['prices'] = $price_ranges;
            } elseif(isset($tab['subdivisions'])) {
                $this->info('subdivisions');
                $subdivisions = $tab['subdivisions'];
                foreach ($subdivisions as $subdivision_key => $subdivision) {
                    $qBuilder = clone $qListingBuilder;
                    $subdivision = Location::where('slug', $subdivision['slug'])->first();
                    $count = $qBuilder
                        ->where("real_estate_listings.subdivision_id", $subdivision->id)
                        ->count();
                    if (!isset($subdivisions[$subdivision_key]['count'])) {
                        $subdivisions[$subdivision_key]['count'] = 0;
                    }
                    $subdivisions[$subdivision_key]['count'] += $count;
                    if ($subdivisions[$subdivision_key]['count'] > 0)
                        $this->info(implode(',', [$subdivisions[$subdivision_key], $subdivisions[$subdivision_key]['count']]));
                }
                $tabs[$key]['subdivisions'] = $subdivisions;
            }
        }
        return $tabs;
    }

    /**
     * @param $qListingBuilder
     * @param $property_ranges
     * @return mixed
     */
    public function updateBannerPrice($qListingBuilder, $property_ranges)
    {
        foreach ($property_ranges as $key => $property) {
            $qBuilder = clone $qListingBuilder;
            if ($property['max'] != '') {
                $count = $qBuilder
                    ->whereBetween('system_price', [$property['min'], $property['max']])
                    ->count();
                $property_ranges[$key]['count'] += $count;
            } else {
                $this->info(implode(',', [$property['min']]));
                $count = $qBuilder
                    ->where('system_price', '>', $property['min'])
                    ->count();
                $property_ranges[$key]['count'] += $count;
            }
            if ($property_ranges[$key]['count'] > 0)
                $this->info(implode(',', [$property['min'], $property['max'], $property_ranges[$key]['count']]));
        }
        return $property_ranges;
    }

}

