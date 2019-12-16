<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\City;


/**
 * Class CityRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class CityRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var CityRepository
     */
    protected $model;

    /**
     * CityRepository constructor.
     * @param City $model
     */
    public function __construct(City $model)
    {
        $this->model = $model;
    }

    /**
     * @param String $id
     * @return String
     */
    public function getById($id)
    {   
        return $this->model->where('id', $id)->get();
    }
}
