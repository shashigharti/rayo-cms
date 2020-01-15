<?php

namespace Robust\RealEstate\Repositories\Common\Traits;

use Illuminate\Database\Eloquent\Builder;
use Robust\RealEstate\Repositories\Interfaces\IListings;
use Illuminate\Support\Arr;

/**
 * Class ListingTrait
 * @package Robust\RealEstate\Repositories\Common\Traits
 */
trait ListingTrait
{
    /**
     * @param $slug
     * @return mixed
     */
    public function getSingle($slug)
    {
        return $this->model->where('slug', $slug)
            ->with('property')
            ->with('images')->first();
    }


    /**
     * @param array $params
     * @param array $fields
     * @return $this
     */
    public function getListings($params = [], $fields = [])
    {
        $additional_fields = array_diff($fields, IListings::LISTING_FIELDS['index']);
        $select_fields = array_merge($additional_fields, IListings::LISTING_FIELDS['index']);
        $qBuilder = $this->model->select($select_fields);

        // Remove all params that are null
        foreach ($params as $key => $param) {
            if ($params == null) {
                Arr::forget($params, $key);
            }
        }

        // Add dynamic where conditions using passed params
        foreach ($params as $key => $param) {
            $qBuilder = $qBuilder->where(IListings::FIELDS_QUERY_MAP[$key]['name'],
                IListings::FIELDS_QUERY_MAP[$key]['condition'],
                "$param");
        }

        $this->model = $qBuilder;
        return $this;
    }


    /**
     * @param $params
     * @return $this
     */
    public function wherePriceBetween($params)
    {
        if (count($params) > 0) {
            $this->model = $this->model->whereBetween('system_price', $params);
        }

        return $this;
    }


    /**
     * @param $params
     * @param string $field
     * @return $this
     */
    public function whereDateBetween($params, $field = 'input_date')
    {
        $this->model = $this->model->whereBetween($field, $params);
        return $this;
    }


    /**
     * @param $params
     * @return $this
     */
    public function whereLocation($params)
    {
        $key = key($params);
        if ($params[$key] != null) {
            $value = $params[$key];
            $location = $this->location->where('slug', '=', $value)->first();
            if (!$location) {
                $location = $this->location->where('id', '=', $value)->first();
            }
            $this->model = $this->model->where(IListings::LOCATION_TYPE_MAP[$key], '=', $location->id);
        }
        return $this;
    }


    /**
     * @param $property_types
     * @param $property_values
     * @return $this
     */
    public function wherePropertyType($property_types, $property_values)
    {
        $this->model = $this->model->whereNotNull('properties_status');
        $this->model = $this->model->whereIn('real_estate_listings.id', function($query) use ($property_types,$property_values) {
            $query->from('real_estate_listing_properties')
                ->select('real_estate_listing_properties.listing_id')
                ->where('real_estate_listing_properties.listing_id','real_estate_listings.id');
                foreach ($property_types as $key => $type){
                    if(isset($property_values[$key]) && $property_values[$key]){
                        $query->where('real_estate_listing_properties.type', $type);
                        $values = explode(',',$property_values[$key]);
                        foreach ($values as $value){
                            $query->where('real_estate_listing_properties.value',$value);
                        }

                    }
                }

        });
        return $this;
    }

}
