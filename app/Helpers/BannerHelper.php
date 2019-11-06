<?php


namespace App\Helpers;


use Robust\Banners\Models\Banner;

class BannerHelper
{
    public function get()
    {
        return Banner::where('status',1)->orderBy('type')->orderBy('order')->with('images')->get();
    }

    public function byType($type,$slider = true)
    {
        $banners =  Banner::where('status',1)
            ->where('type',$type)
            ->where('slider',$slider)
            ->orderBy('order')
            ->with('images.media')
            ->first();
        return $banners->images;
    }
}
