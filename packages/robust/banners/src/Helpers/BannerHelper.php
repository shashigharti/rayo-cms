<?php

namespace Robust\Banners\Helpers;

use Robust\Banners\Models\Banner;
use Robust\Banners\Repositories\BannerRepository;

/**
 * Class BannerHelper
 * @package Robust\Banners\Helpers
 */
class BannerHelper
{
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
     * @return collection
     */
    public function all()
    {
        return $this->banners;
    }

    /**
     * @return collection
     */
    public function getBannersByType($types){
        return $this->banners->whereIn('template', $types)
        ->sortBy('order')
        ->values()
        ->all();
    }

    /**
     * @return collection
     */
    public function getBannersNotInType($types){
        return $this->banners->whereNotIn('template', $types)
        ->sortBy('order')
        ->values()
        ->all();
    }
}