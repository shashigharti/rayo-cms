<?php


namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Website\LocationRepository;

/**
 * Class LocationHelper
 * @package Robust\RealEstate\Helpers
 */
class LocationHelper
{
    /**
     * @var LocationRepository
     */
    protected $location;

    /**
     * LocationHelper constructor.
     * @param LocationRepository $location
     */
    public function __construct(LocationRepository $location)
    {
        $this->location = $location;
    }

    /**
     * @param String $type
     * @return array
     */
    public function getLocations($types)
    {
        $locations = [];
        foreach($types as $type){
            $locations[$type] = $this->location->getLocations(['type' => $type]);
        }
        return $locations;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function byId($id)
    {
        return $this->location->getById($id);
    }
    /**
     * @param $location
     * @return mixed
     */
    public function getLocation($location)
    {
        //in case we want to make multiple change here
        return $this->location->getLocation($location[0] ?? '');
    }
}
