<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\LocationRepository;


class LocationController extends Controller
{
   
    protected $model;

    public function __construct(LocationRepository $model)
    {
        $this->model = $model;
    }
}
