<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\LandMarks\Repositories\Admin\CityRepository;


/**
 * Class CityController
 * @package Robust\Landmarks\Controllers\Api
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
        $this->resource = 'Robust\Landmarks\Resources\City';
    }
}


