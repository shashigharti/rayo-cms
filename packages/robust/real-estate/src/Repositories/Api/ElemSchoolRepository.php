<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\ElementarySchool;


/**
 * Class ElemSchoolRepository
 * @package Robust\LandMarks\Repositories\Admin
 */
class ElemSchoolRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var ElementarySchool
     */
    protected $model;


    /**
     * ElemSchoolRepository constructor.
     * @param ElementarySchool $model
     */
    public function __construct(ElementarySchool $model)
    {
        $this->model = $model;
    }
}
