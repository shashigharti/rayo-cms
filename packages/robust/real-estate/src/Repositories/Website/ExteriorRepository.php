<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Exterior;


/**
 * Class ExteriorRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class ExteriorRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Exterior
     */
    protected $model;


    /**
     * ExteriorRepository constructor.
     * @param Exterior $model
     */
    public function __construct(Exterior $model)
    {
        $this->model = $model;
    }
}
