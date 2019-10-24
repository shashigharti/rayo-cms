<?php
namespace Robust\LandMarks\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\Landmarks\Model\City;

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
}
