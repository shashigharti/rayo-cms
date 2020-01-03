<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\GroupRepository;


class GroupController extends Controller
{
   
    protected $model;

    public function __construct(GroupRepository $model)
    {
        $this->model = $model;
    }
}
