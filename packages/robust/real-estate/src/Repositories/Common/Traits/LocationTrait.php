<?php

namespace Robust\RealEstate\Repositories\Common\Traits;

use Robust\RealEstate\Repositories\Admin\LocationRepository;


/**
 * Trait LocationTrait
 * @package Robust\RealEstate\Repositories\Common\Traits
 */
trait LocationTrait
{

    /**
     * @param $params
     * @return Eloquent Collection
     */
    public function getLocations($params = [], $fields = [])
    {
        $qBuilder = $this->model;

        // Get mapping locationable object for type
        $params = collect($params)->map(function ($value, $key) {
            if ($key == 'type') {
                return LocationRepository::RELATION_MAP[$value]['class'];
            }
            return $value;
        });

        // Limit the number of fields based on the params
        if (count($fields) > 0) {
            $qBuilder = $qBuilder->select($fields);
        }

        foreach ($params as $key => $param) {
            $qBuilder = $qBuilder->where(LocationRepository::FIELDS_QUERY_MAP[$key]['name'],
                LocationRepository::FIELDS_QUERY_MAP[$key]['condition'],
                $param);
        }
        return $qBuilder->get();
    }

    /**
     * @param $type
     * @param $slug
     * @return mixed
     */
    public function getLocation($type, $slug)
    {
        return $this->model
            ->where('locationable_type', LocationRepository::RELATION_MAP[$type]['class'])
            ->where('slug', $slug)
            ->first();
    }

    /**
     * @param $location_type
     * @param $cities
     * @return mixed
     */
    public function getSubdivisions($location_type, $cities)
    {
        $locations = $this->model->whereIn('slug', $cities)->get();
        $subdivisions = $this->model
            ->join('real_estate_subdivisions', 'real_estate_subdivisions.city_id', '=', 'real_estate_locations.id')
            ->where('locationable_type', get_class_by_location_type($location_type))
            ->whereIn('real_estate_subdivisions.city_id', $locations)
            ->get();
        return $subdivisions;
    }

}
