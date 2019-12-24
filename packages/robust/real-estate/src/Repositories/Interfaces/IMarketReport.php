<?php
namespace Robust\RealEstate\Repositories\Interfaces;

Interface IMarketReport {
	/**
     * @var const REPORTABLE_MAP
     */
    public const REPORTABLE_MAP = [
        'cities' => 'Robust\RealEstate\Models\City',
        'subdivisions' => 'Robust\RealEstate\Models\Subdivision',
        'zips' => 'Robust\RealEstate\Models\Zip',
        'school_districts' => 'Robust\RealEstate\Models\SchoolDistrict',
        'counties' => 'Robust\RealEstate\Models\County',
        'areas' => 'Robust\RealEstate\Models\Area',
        'high_schools' => 'Robust\RealEstate\Models\HighSchool'
    ];

    /**
     * @var const PARAM_MAP
     */
    public const PARAM_MAP = [
        'cities' => 'city_id'
    ];

    /**
     * @var const LOCATION_TYPES_WITH_SUBLOCATIONS
     */
    public const LOCATION_TYPES_WITH_SUBLOCATIONS = [
        'cities' => [
            'sub_location_type'=>'subdivisions',
            'field' => 'city_id',
            'reportable_type' => 'Robust\RealEstate\Models\Subdivision'
        ]
    ];    
}
