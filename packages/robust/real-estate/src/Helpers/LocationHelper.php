<?php


namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Website\LocationRepository;
use Robust\RealEstate\Repositories\Website\CityRepository;

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
    public function __construct(LocationRepository $location, CityRepository $city)
    {
        $this->location = $location;

        // temporary fix
        $this->cities = $city;

    }

    /**
     * @param String $type
     * @return Array
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
     * @param String $type
     * @param String $id
     * @return String
     */
    public function getName($type, $id)
    {   
        // this will be changed
        return $this->$type->getById($id)->first()->name;
    }
}
