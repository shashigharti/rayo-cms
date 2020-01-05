<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;
use Robust\RealEstate\Repositories\Admin\PageRepository;


class PageController extends Controller
{
    use CrudTrait, ViewTrait;

    protected $model;

    public function __construct(PageRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Page';
        $this->package_name = 'real-estate';
        $this->view = 'admin.pages';
        $this->title = 'Pages';
    }
}
