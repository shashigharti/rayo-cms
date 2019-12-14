<?php
namespace Robust\RealEstate\Repositories\API;

use Robust\RealEstate\Models\Location;

/**
 * Class LocationRepository
 * @package Robust\RealEstate\Repositories\API
 */
class LocationRepository
{
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
