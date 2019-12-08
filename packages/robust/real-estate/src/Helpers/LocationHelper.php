<?php


namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Website\CityRepository;
use Robust\RealEstate\Repositories\Website\CountyRepository;
use Robust\RealEstate\Repositories\Website\ZipRepository;

/**
 * Class LocationHelper
 * @package Robust\RealEstate\Helpers
 */
class LocationHelper
{
    /**
     * @var CityRepository
     */
    protected $cities;
    /**
     * @var CountyRepository
     */
    protected $counties;
    /**
     * @var ZipRepository
     */
    protected $zips;

    /**
     * LocationHelper constructor.
     * @param CityRepository $city
     * @param CountyRepository $counties
     * @param ZipRepository $zips
     */
    public function __construct(CityRepository $city, CountyRepository $counties, ZipRepository $zips)
    {
        $this->cities = $city;
        $this->counties = $counties;
        $this->zips = $zips;
    }

    public function getLocations($types)
    {
        $locations = [];
        foreach ($types as $type)
        {
            $results = $this->$type->get();
            $locations[$type] = $results;
        }
        return $locations;
    }

    public function getName($type,$id)
    {
        return $this->$type->where('id',$id)->first()->name;
    }
}
