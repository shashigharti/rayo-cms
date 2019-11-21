<?php

namespace Robust\Banners\Helpers;

use Robust\Banners\Models\Banner;

/**
 * Class BannerHelper
 * @package Robust\Banners\Helpers
 */
class BannerHelper
{
    private $banners = [];

    /**
     * @return collection
     */
    public function getBanners(BannerRepository $banner)
    {
        $this->banners = collect();
        $banners = $banner->get();
        
        foreach($banners as $banner){
            $this->banners[$banner->template][] = $banner;
        }
        return $this->banners ;
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