<?php
namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Models\Image;
use Robust\RealEstate\Repositories\BannerRepository;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;

/**
 * Class BannerController
 * @package Robust\RealEstate\Controllers\Admin
 */
class BannerController extends Controller
{
    use CrudTrait, ViewTrait;


    /**
     * BannerController constructor.
     * @param Request $request
     * @param BannerRepository $banners
     */
    public function __construct(Request $request, BannerRepository $banners)
    {
        $this->model = $banners;
        $this->request = $request;
        $this->ui = 'Robust\RealEstate\UI\Banner';
        $this->package_name = 'banners';
        $this->view = 'admin.banners';
        $this->title = 'Banners';
        $this->child_table = 'core::admin.images.table';
    }


    /**
     * @param BannerRepository $banner
     * @param $banner_id
     * @return $this
     */
    public function getBannerImages(BannerRepository $banner, $banner_id)
    {
        $banner = $banner->find($banner_id);
        $records = $banner->images()->paginate();
        $this->title = "";
        return $this->display($this->child_table,
            [
                'records' => $records,
                'package' => $this->package_name,
                'model' => $banner,
                'child' => new Image(),
                'child_ui' => new \Robust\Banners\UI\Image
            ]
        );
    }
}
