<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\LocationRepository;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;

class LocationController extends Controller
{
    use CrudTrait, ViewTrait;
    protected $model;

    public function __construct(LocationRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Location';
        $this->package_name = 'real-estate';
        $this->view = 'admin.locations';
        $this->title = 'Locations';
    }
}
