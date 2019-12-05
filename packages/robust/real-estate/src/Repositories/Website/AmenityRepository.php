<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Amenity;


/**
 * Class AmenityRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class AmenityRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Amenity
     */
    protected $model;


    /**
     * AmenityRepository constructor.
     * @param Amenity $model
     */
    public function __construct(Amenity $model)
    {
        $this->model = $model;
    }
}
