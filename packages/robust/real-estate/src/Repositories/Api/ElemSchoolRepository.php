<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\ElemSchool;


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
