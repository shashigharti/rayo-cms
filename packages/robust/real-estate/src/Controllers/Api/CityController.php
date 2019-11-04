<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\CityRepository;


/**
 * Class CityController
 * @package Robust\RealEstate\Controllers\Api
 */
class CityController extends Controller
{
    use ApiTrait;
    /**
     * @var CityRepository
     */
    protected $model;
    /**
     * @var string
     */
    protected $resource;

    /**
     * CityController constructor.
     * @param CityRepository $model
     */
    public function __construct(CityRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\RealEstate\Resources\City';
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->model->getActive();
    }
}


