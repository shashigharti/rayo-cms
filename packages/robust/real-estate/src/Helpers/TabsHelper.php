<?php

namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Admin\LocationRepository;

/**
 * Class TabsHelper
 * @package Robust\RealEstate\Helpers
 */
class TabsHelper
{
    /**
     * TabsHelper constructor.
     * @param LocationRepository $location
     */
    public function __construct(LocationRepository $location)
    {
        $this->location = $location;
    }


    /**
     * @param $location_type
     * @param $locations
     * @return mixed
     */
    public function neighborhoods($location_type, $locations){
        $locations = $this->location->getSubdivisions($location_type, $locations);
        return $locations;
    }
}
