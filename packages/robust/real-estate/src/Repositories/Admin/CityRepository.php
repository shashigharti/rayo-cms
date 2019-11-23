<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\City;


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
}
