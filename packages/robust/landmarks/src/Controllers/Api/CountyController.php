<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\LandMarks\Repositories\Admin\CountyRepository;



class CountyController extends Controller
{
    use ApiTrait;
    /**
     * @var CountyRepository
     */
    protected $model ;
    protected $resource;

    /**
     * CountyController constructor.
     * @param CountyRepository $model
     */
    public function __construct(CountyRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Landmarks\Resources\County';
    }
}


