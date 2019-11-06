<?php

namespace Robust\Banners\Helpers;

use Robust\Banners\Models\Banner;

/**
 * Class BannerHelper
 * @package Robust\Banners\Helpers
 */
class BannerHelper
{

    /**
     * @param null $slug
     * @return mixed
     */
    public function getBanners($slug = null)
    {
        $banner = Banner::join('banners_images', 'banners.id', '=', 'banners_images.banner_id')
            ->join('medias', 'banners_images.media_id', '=', 'medias.id')
            ->where('banners.slug', $slug)
            ->select('banners.*', 'banners_images.*', 'medias.file as file')
            ->get();

        return $banner;
    }
}