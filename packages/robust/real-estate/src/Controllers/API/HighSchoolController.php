<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\HighSchoolRepository;


/**
 * Class HighSchoolController
 * @package Robust\RealEstate\Controllers\Api
 */
class HighSchoolController extends Controller
{
    use ApiTrait;
    /**
     * @var HighSchoolRepository
     */
    protected $model ;
    /**
     * @var string
     */
    protected $resource;

    /**
     * HighSchoolController constructor.
     * @param HighSchoolRepository $model
     */
    public function __construct(HighSchoolRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\RealEstate\Resources\HighSchool';
    }

}


