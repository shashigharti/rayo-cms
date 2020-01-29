<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\Location;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\RealEstate\Repositories\Common\Traits\LocationTrait;
use Robust\RealEstate\Repositories\Interfaces\ILocation;

class LocationRepository implements ILocation
{
    use LocationTrait, CommonRepositoryTrait;

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

}
