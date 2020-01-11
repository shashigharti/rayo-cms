<?php

namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Website\AttributeRepository;
use Illuminate\Support\Arr;

/**
 * Class AdvanceSearchHelper
 * @package Robust\RealEstate\Helpers
 */
class AdvanceSearchHelper
{

    /**
     * AttributeRepository constructor.
     * @param AttributeRepository $listing
     */
    public function __construct(AttributeRepository $attribute)
    {
        $this->attribute = $attribute;
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

    /**
     * @param $params
     * @return Eloquent Collection
     */
    public function getAttributesListByPropertyName($property_name)
    {
        $record = $this->attribute->getAttributes(['property_name' => $property_name])->first();
        return json_decode($record->values, true);
    }

    /**
     * @param $params
     * @return array
     */
    public function getAugmentedAttributesListByPropertyName($property_name)
    {
        $values = Arr::pluck($this->getAttributesListByPropertyName($property_name), 'name', 'name');
        $types = config('real-estate.frw.settings.advance-search')['property_types'];
        $types = array_combine($types, $types);
        $merged_types = array_unique(array_merge($values, $types));
        return  $merged_types;
    }

    /**
     * @return array
     */
    public function getAdvanceSearchFilters(){
        $filters = config('rws.advance-search');
        $processed_filters = [];
        foreach($filters as $filter_attribute => $filter){
            $processed_filters[$filter_attribute] = $filter['display_name'];
        }

        return  $processed_filters;
    }
}
