<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Subdivision;


/**
 * Class SubdivisionRepository
 * @package Robust\LandMarks\Repositories\Admin
 */
class SubdivisionRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Subdivision
     */
    protected $model;


    /**
     * SubdivisionRepository constructor.
     * @param Subdivision $model
     */
    public function __construct(Subdivision $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getSubdivisionWithName()
    {
        return $this->model->select('id','name')->orderBy('name')->get();
    }


}
