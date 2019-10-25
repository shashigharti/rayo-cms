<?php
namespace Robust\LandMarks\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\Landmarks\Models\Grid;


/**
 * Class GridRepository
 * @package Robust\LandMarks\Repositories\Admin
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
