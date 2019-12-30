<?php
namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\BannerRepository;
use Robust\RealEstate\Repositories\ImageRepository;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;

/**
 * Class ImageController
 * @package Robust\RealEstate\Controllers\Admin
 */
class ImageController extends Controller
{
    use CrudTrait, ViewTrait;


    /**
     * ImageController constructor.
     * @param Request $request
     * @param ImageRepository $banner_image
     * @param BannerRepository $banner
     */
    public function __construct(Request $request, ImageRepository $banner_image, BannerRepository $banner)
    {
        $this->model = $banner_image;
        $this->request = $request;
        $this->ui = 'Robust\RealEstate\UI\Image';
        $this->package_name = 'banners';
        $this->view = 'admin.images';
        $this->banner = $banner;
        //Since it is a child table. redirect it back to the previous url
        $this->previous_url = url()->previous();
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $model = $this->model->find($id);
        $records = $this->model->where('banner_id', $model->banner_id)->paginate();
        $banner = $this->banner->find($model->banner_id);
        return $this->display("{$this->package_name}::{$this->view}.table", [
                'child' => $model,
                'records' => $records,
                'package' => $this->package_name,
                'model' => $banner,
                'child_ui' => new \Robust\RealEstate\UI\Image,
                'ui' => 'Robust\RealEstate\UI\Banner'
            ]
        );
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $redirect = isset($this->redirect) ? $this->redirect : $this->view;
        $image = $this->model->find($id);
        $banner = $this->banner->find($image->banner_id);
        $this->model->delete($id);
        return redirect(route("admin.banner.images.get-images", $banner->id))->with('message',
            'Record was successfully deleted');
    }
}
