<?php

namespace Robust\Pages\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\Pages\Repositories\Admin\CategoryRepository;


/**
 * Class PageCategoryApiController
 * @package Robust\Pages\Controllers\Admin
 */
class PageCategoryController extends Controller
{
    use ApiTrait;
    /**
     * @var CategoryRepository
     */
    /**
     * @var CategoryRepository|string
     */
    protected $model,$resource;

    /**
     * PageCategoryController constructor.
     * @param CategoryRepository $model
     */
    public function __construct(CategoryRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Pages\Resources\Category';
    }
}
