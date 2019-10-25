<?php
namespace Robust\LandMarks\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\Landmarks\Models\ElemSchool;


/**
 * Class ElemSchoolRepository
 * @package Robust\LandMarks\Repositories\Admin
 */
class ElemSchoolRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var ElemSchool
     */
    protected $model;


    /**
     * ElemSchoolRepository constructor.
     * @param ElemSchool $model
     */
    public function __construct(ElemSchool $model)
    {
        $this->model = $model;
    }
}
