<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\HighSchool;


/**
 * Class HighSchoolRepository
 * @package Robust\LandMarks\Repositories\Admin
 */
class HighSchoolRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;
    /**
     * @var HighSchool
     */
    protected $model;

    /**
     * HighSchoolRepository constructor.
     * @param HighSchool $model
     */
    public function __construct(HighSchool $model)
    {
        $this->model = $model;
    }
}
