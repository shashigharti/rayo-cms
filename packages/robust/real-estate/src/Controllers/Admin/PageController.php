<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\PageRepository;


class PageController extends Controller
{
   
    protected $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}
