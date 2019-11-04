<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Api\GridRepository;


/**
 * Class GridController
 * @package Robust\RealEstate\Controllers\Api
 */
class GridController extends Controller
{
    /**
     * @var GridRepository
     */
    protected $model;
    /**
     * @var string
     */
    protected $resource;

    /**
     * GridController constructor.
     * @param GridRepository $model
     */
    public function __construct(GridRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Landmarks\Resources\Grid';
    }
}


