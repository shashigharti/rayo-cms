<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\LandMarks\Repositories\Admin\HighSchoolRepository;


/**
 * Class HighSchoolController
 * @package Robust\Landmarks\Controllers\Api
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
        $this->resource = 'Robust\Landmarks\Resources\HighSchool';
    }

}


