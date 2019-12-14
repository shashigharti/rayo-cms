<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\MiddleSchool;


/**
 * Class MiddleSchoolRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class MiddleSchoolRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;
    /**
     * @var MiddleSchool
     */
    protected $model;

    /**
     * MiddleSchoolRepository constructor.
     * @param MiddleSchool $model
     */
    public function __construct(MiddleSchool $model)
    {
        $this->model = $model;
    }
}
