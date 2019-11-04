<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\RealEstate\Repositories\Api\MiddleSchoolRepository;


/**
 * Class MiddleSchoolController
 * @package Robust\RealEstate\Controllers\Api
 */
class MiddleSchoolController extends Controller
{
    use ApiTrait;

    /**
     * @var MiddleSchoolRepository
     */
    protected $model;
    /**
     * @var string
     */
    protected $resource;

    /**
     * MiddleSchoolController constructor.
     * @param MiddleSchoolRepository $model
     */
    public function __construct(MiddleSchoolRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\RealEstate\Resources\MiddleSchool';
    }
}


