<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\CountyRepository;


/**
 * Class CountyController
 * @package Robust\RealEstate\Controllers\Api
 */
class CountyController extends Controller
{
    use ApiTrait;
    /**
     * @var CountyRepository
     */
    protected $model ;
    /**
     * @var string
     */
    protected $resource;

    /**
     * CountyController constructor.
     * @param CountyRepository $model
     */
    public function __construct(CountyRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\RealEstate\Resources\County';
    }
}


