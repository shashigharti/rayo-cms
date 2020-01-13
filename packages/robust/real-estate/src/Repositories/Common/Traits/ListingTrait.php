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
     * @return $this
     */
    public function whereDateBetween($params)
    {
        $this->model = $this->model->whereBetween('input_date', $params);
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
     * @param $params
     * @return $this
     */
    public function wherePropertyType($params)
    {

        return $this;
    }

    /**
     * @param $params
     * @return $this
     */
    public function whereLocations($params)
    {
        $key = key($params);
        if ($params[$key] != null) {
            $locations = $params[$key];
            $locations = $this->location->whereIn('slug', $locations)->pluck('id');
            if (!$locations) {
                $locations = $this->location->whereIn('slug', $locations)->pluck('id');
            }
            $this->model = $this->model->whereIn(IListings::LOCATION_TYPE_MAP[$key], $locations);
        }
        return $this;
    }

}
