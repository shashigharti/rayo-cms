<?php

namespace Robust\RealEstate\Repositories\Interfaces;

Interface ILocation
{
    /**
     * @var const FIELDS_QUERY_MAP
     */
    protected const FIELDS_QUERY_MAP = [
        'name' => ['name' => 'name', 'condition' => 'LIKE'],
        'slug' => ['name' => 'slug', 'condition' => 'LIKE'],
        'id' => ['name' => 'id', 'condition' => '='],
        'status' => ['name' => 'status', 'condition' => '='],
        'type' => ['name' => 'locationable_type', 'condition' => '=']
    ];

    /**
     * @var const RELATION_MAP
     */
    protected const RELATION_MAP = [
        'cities' => ['class' => 'Robust\RealEstate\Models\City'],
        'zips' => ['class' => 'Robust\RealEstate\Models\Zip'],
        'counties' => ['class' => 'Robust\RealEstate\Models\County'],
        'high_schools' => ['class' => 'Robust\RealEstate\Models\HighSchool'],
        'elementary_schools' => ['class' => 'Robust\RealEstate\Models\ElementarySchool'],
        'middle_schools' => ['class' => 'Robust\RealEstate\Models\MiddleSchool'],
        'subdivisions' => ['class' => 'Robust\RealEstate\Models\Subdivision']
    ];
}
