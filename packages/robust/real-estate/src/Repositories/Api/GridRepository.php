<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Grid;


/**
 * Class GridRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class GridRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * GridRepository constructor.
     * @param Grid $model
     */
    public function __construct(Grid $model)
    {
        $this->model = $model;
    }
}
