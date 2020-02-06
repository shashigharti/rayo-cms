<?php

namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Repositories\Common\Traits\ListingTrait;
use Robust\RealEstate\Repositories\Interfaces\IListings;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\Location;


/**
 * Class ListingRepository
 *
 * @package Robust\RealEstate\Repositories\Website
 */
class ListingRepository implements IListings
{
    use CommonRepositoryTrait, ListingTrait, SearchRepositoryTrait;

    /**
     * @var Listing
     */
    protected $model;

    /**
     * @var array params
     */
    protected $params;

    /**
     * ListingRepository constructor.
     * @param Listing $model
     */
    public function __construct(Listing $model, Location $location, BannerRepository $banner)
    {
        $this->model = $model;
        $this->location = $location;
        $this->banner = $banner;
    }

    /**
     * @param $type
     * @param $value
     * @return mixed
     *
     * TBR -- To be removed
     */
    public function whereType($type, $value)
    {
        return $this->model->where($type, $value);
    }


    /**
     * @param $tab_type
     * @param $params
     * @return mixed
     */
    public function getTabsQuery($tab_type, $params)
    {
        $function_map = [
            'sd' => 'whereSubdivisions'
        ];
        $func = $function_map[$tab_type];
        return $this->$func($params);
    }


    /**
     * @param $banner_slug
     * @param null $tab_type
     * @param null $tab_slug
     * @return ListingRepository
     */
    public function processBannerParams($banner, $tab_type = null, $tab_slug = null)
    {
        $properties = json_decode($banner->properties);
        $locations_count = (isset($properties->locations)) ? count((array)$properties->locations) : 0;
        $attributes_count = (isset($properties->attributes)) ? count((array)$properties->attributes) : 0;
        $lParams = [];
        $pParams = [];

        // Get Query Builder
        $qBuilder = $this->getListings();

        // Process conditions for banner
        foreach ((array)$properties->locations as $key => $location) {
            $lParams[$key] = implode(',', $location);
        }
        if ($attributes_count > 0) {
            foreach ((array)$properties->attributes as $key => $attribute) {
                $pParams[$key] = implode(',', $attribute);
            }
        }

        // Process conditions for tabs
        if ($tab_type === 'tb') {
            $tab_slug = str_replace('-', '_', $tab_slug);
            foreach ((array)$properties->tabs->{$tab_slug}->conditions as $key => $property) {
                $pParams[$property->property_type] = $property->values;
            }
        }

        if ($locations_count > 0) {
            $qBuilder = $qBuilder->whereLocation($lParams);
        }
        if (count($pParams) > 0) {
            $qBuilder = $qBuilder->wherePropertyType($pParams);
        }

        return $qBuilder;
    }

}
