<?php

namespace Robust\Banners\Controllers\API;

use Robust\Banners\Helpers\BannerHelper;
use Robust\Banners\Repositories\BannerRepository;
use Robust\Core\Controllers\Admin\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;

/**
 * Class BannerController
 * @package Robust\Banners\Controllers\API
 */
class BannerController extends Controller
{
    use ApiTrait;
    protected $model,$resource;

    public function __construct(BannerRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Banners\Resources\Banner';
    }

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
