<?php

namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Admin\LocationRepository;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\Core\Controllers\Common\Traits\ViewTrait;

/**
 * Class LocationController
 * @package Robust\RealEstate\Controllers\Admin
 */
class LocationController extends Controller
{
    use CrudTrait, ViewTrait;

    /**
     * @var LocationRepository
     */
    protected $model;

    /**
     * LocationController constructor.
     * @param LocationRepository $model
     */
    public function __construct(LocationRepository $model)
    {
        $this->model = $model;
        $this->ui = 'Robust\RealEstate\UI\Location';
        $this->package_name = 'real-estate';
        $this->view = 'admin.locations';
        $this->title = 'Locations';
    }
}
