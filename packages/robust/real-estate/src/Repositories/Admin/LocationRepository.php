<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\Location;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;

/**
 * Class LocationRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class LocationRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var Location
     */
    protected $model;


    /**
     *
     */
    protected const FIELDS_QUERY_MAP = [
        'name' => ['name' => 'name', 'condition' => 'LIKE'],
        'slug' => ['name' => 'slug', 'condition' => 'LIKE'],
        'id' => ['name' => 'id', 'condition' => '='],
        'status' => ['name' => 'status', 'condition' => '='],
        'type' => ['name' => 'locationable_type', 'condition' => '=']
    ];

    /**
     *
     */
    protected const RELATION_MAP = [
        'cities' => ['class' => '\Robust\RealEstate\Models\City'],
        'zips' => ['class' => '\Robust\RealEstate\Models\Zip'],
        'counties' => ['class' => '\Robust\RealEstate\Models\County'],
        'high_schools' => ['class' => '\Robust\RealEstate\Models\HighSchool'],
        'elementary_schools' => ['class' => '\Robust\RealEstate\Models\ElementarySchool'],
        'middle_schools' => ['class' => '\Robust\RealEstate\Models\MiddleSchool']
    ];

    /**
     * LocationRepository constructor.
     * @param Location $model
     */
    public function __construct(Location $model)
    {
        $this->model = $model;
    }

    /**
     * @param $params
     * @return Eloquent Collection
     */
    public function getLocations($params = [], $fields = [])
    {
        $qBuilder = $this->model;

        // Get mapping locationable object for type
        $params = collect($params)->map(function ($value, $key) {
            if($key == 'type'){
                return LocationRepository::RELATION_MAP[$value]['class'];
            }
            return $value;
        });


        // Limit the number of fields based on the params
        if(count($fields) > 0){
            $qBuilder = $qBuilder->select($fields);
        }

        foreach($params as $key => $param){
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
    public function getSubdivisions($location_type, $cities){
        $locations = $this->model->whereIn('slug', $cities)->get();
        $subdivisions = $this->model
            ->join('real_estate_subdivisions', 'real_estate_subdivisions.city_id', '=', 'real_estate_locations.id')
            ->where('locationable_type', get_class_by_location_type($location_type))
            ->whereIn('real_estate_subdivisions.city_id', $locations)
            ->get();
        return $subdivisions;
    }
}
