<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Landmarks\Models\Grid;
use Robust\LandMarks\Repositories\Admin\GridRepository;
use Robust\Landmarks\Resources\Grid as GridResource;


/**
 * Class GridController
 * @package Robust\Landmarks\Controllers\Api
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


