<?php
namespace Robust\RealEstate\Repositories\API;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\County;


/**
 * Class CountyRepository
 * @package Robust\RealEstate\Repositories\API
 */
class CountyRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * CountyRepository constructor.
     * @param County $model
     */
    public function __construct(County $model)
    {
        $this->model = $model;
    }
}
