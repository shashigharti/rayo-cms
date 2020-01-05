<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;
use Robust\RealEstate\Repositories\Admin\BannerRepository;


class BannerController extends Controller
{
    use CrudTrait, ViewTrait;

    protected $model;

    public function __construct(BannerRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Banner';
        $this->package_name = 'real-estate';
        $this->view = 'admin.banners';
        $this->title = 'Banners';
    }
}
