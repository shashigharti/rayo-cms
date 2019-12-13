<?php

namespace Robust\RealEstate\Helpers;



use Robust\RealEstate\Repositories\Website\AmenityRepository;
use Robust\RealEstate\Repositories\Website\ConstructionRepository;
use Robust\RealEstate\Repositories\Website\ExteriorRepository;
use Robust\RealEstate\Repositories\Website\InteriorRepository;
use Robust\RealEstate\Repositories\Website\StyleRepository;

/**
 * Class AdvanceSearchHelper
 * @package Robust\RealEstate\Helpers
 */
class AdvanceSearchHelper
{

    /**
     * @var AmenityRepository
     */
    protected $amenities;
    /**
     * @var StyleRepository
     */
    protected $styles;
    /**
     * @var ConstructionRepository
     */
    protected $constructions;
    /**
     * @var InteriorRepository
     */
    protected $interiors;
    /**
     * @var ExteriorRepository
     */
    protected $exteriors;
    /**
     * AdvanceSearchHelper constructor.
     * @param AmenityRepository $amenities
     * @param StyleRepository $styles
     * @param ConstructionRepository $constructions
     * @param InteriorRepository $interiors
     * @param ExteriorRepository $exteriors
     */

    public function __construct
    (
        AmenityRepository $amenities,
        StyleRepository $styles,
        ConstructionRepository $constructions,
        InteriorRepository $interiors,
        ExteriorRepository $exteriors
    )
    {
        $this->amenities = $amenities;
        $this->styles = $styles;
        $this->constructions = $constructions;
        $this->interiors = $interiors;
        $this->exteriors = $exteriors;
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getFeatures($type)
    {
        return $this->$type->get()->pluck('name');
    }

    /**
     * @return string
     */
    public function getSearchURL(){
        //for route with params
        $params = request()->route()->parameters();
        $route_name  = request()->route()->getName();
        return $route_name === 'website.home'?route('website.realestate.homes-for-sale'):route($route_name,$params);
    }
}
