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
    public function getName($id)
    { 
        return $this->location->getById($id)->first()->name;    
    }
}
