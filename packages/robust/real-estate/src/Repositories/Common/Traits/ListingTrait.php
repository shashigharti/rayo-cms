<?php

namespace Robust\RealEstate\Repositories\Common\Traits;

use Illuminate\Database\Eloquent\Builder;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Repositories\Interfaces\IListings;
use Illuminate\Support\Arr;
use Robust\RealEstate\Repositories\Website\LocationRepository;

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
     * @param $subdivisions
     * @return $this
     */
    public function whereSubdivisions($subdivisions)
    {
        $qBuilder = $this->model;
        $values = explode(",", $subdivisions);
        $location_ids = $this->location
            ->where('locationable_type', IListings::LOCATION_TYPE_CLASS_MAP['subdivisions'])
            ->whereIn('slug', $values)
            ->pluck('id');
        $qBuilder = $qBuilder->whereIn(IListings::LOCATION_TYPE_MAP['subdivisions'], $location_ids);

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
        $qBuilder = $this->model;
        foreach ($params as $key => $param) {
            $values = explode(",", $param);
            $location_ids = $this->location
                ->whereIn('slug', $values)
                ->where('locationable_type', IListings::LOCATION_TYPE_CLASS_MAP[$key])
                ->pluck('id');
            $qBuilder = $qBuilder->whereIn(IListings::LOCATION_TYPE_MAP[$key], $location_ids);
        }
        $this->model = $qBuilder;
        return $this;
    }


    /**
     * @param $params
     * @return $this
     */
    public function wherePropertyType($params)
    {
        $qBuilder = $this->model
            ->leftJoin('real_estate_listing_properties', 'real_estate_listing_properties.listing_id', '=', 'real_estate_listings.id');

        foreach ($params as $key => $param) {
            $values = explode(",", $param);
            $qBuilder = $qBuilder->where(function ($query) use ($key, $values) {
                $query->where('real_estate_listing_properties.type', '=', $key)
                    ->whereIn('real_estate_listing_properties.value', $values);
            });
        }
        $this->model = $qBuilder;
        return $this;
    }


    /**
     * @param $location
     * @param int $limit
     * @return mixed
     */
    public function getListingsByDistance($location, $limit = 100)
    {
        $lat = $location['lat'];
        $lng = $location['lng'];
        $records = $this->model->select(\DB::raw("*,
                                (
                                   3959 *
                                   acos(cos(radians($lat)) *
                                   cos(radians(`latitude`)) *
                                   cos(radians(`longitude`) -
                                   radians($lng)) +
                                   sin(radians($lat)) *
                                   sin(radians(latitude )))
                                ) AS distance
                            "))
            ->having('distance', '<', '.5')
            ->orderBy('distance')
            ->limit($limit)->get();
        return $records;
    }
}
