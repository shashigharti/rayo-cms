<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\RealEstate\Models\Location;

/**
 * Class LocationRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class LocationRepository
{
    /**
     * @var Location
     */
    protected $model;

    protected const FIELDS_QUERY_MAP = [
        'name' => ['name' => 'name', 'condition' => 'LIKE'],
        'slug' => ['name' => 'slug', 'condition' => 'LIKE'],
        'id' => ['name' => 'id', 'condition' => '='],
        'status' => ['name' => 'status', 'condition' => '='],
        'type' => ['name' => 'locationable_type', 'condition' => '=']
    ];

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

        $qBuilder = $qBuilder->where(function($q) {
         $q->where('active_count', '>', 0)->orWhere('sold_count', '>', 0);
        });
        
        return $qBuilder->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->where('id', $id)->get();
    }
}
