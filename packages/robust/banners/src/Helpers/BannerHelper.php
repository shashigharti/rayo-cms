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
    private $model;

    /**
     * BannerHelper constructor.
     * @param Banner $model
     */
    public function __construct(BannerRepository $banner)
    {
        $this->banners = collect();
        $this->model = $banner;
    }

    /**
     * @return collection
     */
    public function getBanners()
    {
        $this->banners = $this->model->get();
        return $this->banners;
    }

    /**
     * @return collection
     */
    public function getBannerByType($types){
        return $this->banners->whereIn('template', $types);
    }

    /**
     * @return collection
     */
    public function getBannersNotInType($types){
        return $this->banners->whereNotIn('template', $types);
    }
}