<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Construction;


/**
 * Class ConstructionRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class ConstructionRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Construction
     */
    protected $model;


    /**
     * ConstructionRepository constructor.
     * @param Construction $model
     */
    public function __construct(Construction $model)
    {
        $this->model = $model;
    }
}
