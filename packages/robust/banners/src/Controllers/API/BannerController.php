<?php

namespace Robust\Banners\Controllers\API;

use Robust\Banners\Helpers\BannerHelper;
use Robust\Core\Controllers\Admin\Controller;

/**
 * Class BannerController
 * @package Robust\Banners\Controllers\API
 */
class BannerController extends Controller
{
    /**
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll($slug)
    {
        $banner = with(new BannerHelper())->getBanners($slug);
        return response()->json($banner->sortByDesc('created_at')->values());
    }
}