<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\City;

/**
 * Class PageRepository
 * @package Robust\Pages\Repositories\Admin
 */
class CityRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * PageRepository constructor.
     * @param Page $model
     */
    public function __construct(City $model)
    {
        $this->model = $model;
    }

    public function getActive()
    {
        return $this->model->where('navigation',0)
            ->where('dropdown','!=',1)
            ->orderBy('menu_order','asc')
            ->get();
    }
}
