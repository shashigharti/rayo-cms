<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\LandMarks\Repositories\Admin\ElemSchoolRepository;


/**
 * Class ElemSchoolController
 * @package Robust\Landmarks\Controllers\Api
 */
class ElemSchoolController extends Controller
{
    use ApiTrait;


    /**
     * @var ElemSchoolRepository
     */
    protected $model;
    /**
     * @var string
     */
    protected $resource;


    /**
     * ElemSchoolController constructor.
     * @param ElemSchoolRepository $model
     */
    public function __construct(ElemSchoolRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Landmarks\Resources\ElemSchool';
    }
}


