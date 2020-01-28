<?php

namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\Banner;
use Robust\RealEstate\Repositories\Website\LocationRepository;

/**
 * Class BannerHelper
 * @package Robust\RealEstate\Helpers
 */
class BannerHelper
{
    /**
     * @var mixed
     */
    private $banners;


    /**
     * BannerHelper constructor.
     * @param Banner $banner
     * @param LocationRepository $location
     */
    public function __construct(Banner $banner, LocationRepository $location)
    {
        $this->banners = $banner;
        $this->location = $location;
    }


    /**
     * @return mixed
     */
    public function all()
    {
        return $this->banners->get();
    }


    /**
     * @param $types
     * @return mixed
     */
    public function getBannersByType($types)
    {
        return $this->banners->whereIn('template', $types)
            ->get()
            ->sortBy('order')
            ->values()
            ->all();
    }


    /**
     * @param $slug
     * @return mixed
     */
    public function getBannersBySlug($slug)
    {
        return $this->banners->where('slug', $slug)
            ->first();
    }


    /**
     * @param \Illuminate\Support\Collection $banners
     * @param array $sort_by
     * @return \Illuminate\Support\Collection
     */
    public function sortBannersByArray($banners, $sort_by_array)
    {
        $banners_new = $banners;

        if (count($sort_by_array) > 0) {
            $banners_new = [];
            foreach ($banners as $banner) {
                if (in_array($banner->id, $sort_by_array)) {
                    $id = array_search($banner->id, $sort_by_array);
                    $banners_new[$id] = $banner;
                }
            }
            ksort($banners_new);
            $banners_new = collect($banners_new);
        }


        return $banners_new;
    }


    /**
     * @param $location_type
     * @param $locations
     * @return mixed
     */
    public function neighborhoods($location_type, $locations)
    {
        $locations = $this->location->getSubdivisions($location_type, $locations);
        return $locations;
    }
}
