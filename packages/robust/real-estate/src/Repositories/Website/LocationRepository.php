<?php

namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\RealEstate\Models\Location;
use Robust\RealEstate\Repositories\Common\Traits\LocationTrait;
use Robust\RealEstate\Repositories\Interfaces\ILocation;

/**
 * Class LocationRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class LocationRepository implements ILocation
{
    use LocationTrait, CommonRepositoryTrait;

    /**
     * @var Location
     */
    protected $model;

    /**
     * LocationRepository constructor.
     * @param Location $model
     */
    public function __construct(Location $model)
    {
        $this->model = $model;
    }
}
