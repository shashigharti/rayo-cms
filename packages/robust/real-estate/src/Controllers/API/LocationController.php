<?php
namespace Robust\RealEstate\Controllers\API;

use Robust\Core\Controllers\API\Traits\CrudTrait;
use Robust\RealEstate\Repositories\API\LocationRepository;

/**
 * Class LocationController
 * @package Robust\RealEstate\Controllers\API
 */
class LocationController extends Controller
{
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
    }
    
    
}
