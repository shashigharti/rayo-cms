<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\Banner;
use Robust\RealEstate\Repositories\Website\BannerRepository;

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
     * @param Banner $model
     */
    public function __construct(BannerRepository $banner)
    {
        $this->banners = $banner->get();
    }


    /**
     * @return mixed
     */
    public function all()
    {
        return $this->banners;
    }


    /**
     * @param $types
     * @return mixed
     */
    public function getBannersByType($types){
        return $this->banners->whereIn('template', $types)
        ->sortBy('order')
        ->values()
        ->all();
    }


    /**
     * @param $slug
     * @return mixed
     */
    public function getBannersBySlug($slug){
        return $this->banners->where('slug', $slug)
            ->first();
    }


    /**
     * @param $types
     * @return mixed
     */
    public function getBannersNotInType($types){
        return $this->banners->whereNotIn('template', $types)
        ->sortBy('order')
        ->values()
        ->all();
    }
}
