<?php

namespace Robust\RealEstate\Repositories\Interfaces;

Interface IMarketReport
{
    /**
     * @var const LOCATION_TYPE_MAP
     */
    public const LOCATION_TYPE_MAP = [
        'cities' => 'Robust\RealEstate\Models\City',
        'subdivisions' => 'Robust\RealEstate\Models\Subdivision',
        'zips' => 'Robust\RealEstate\Models\Zip',
        'school_districts' => 'Robust\RealEstate\Models\SchoolDistrict',
        'counties' => 'Robust\RealEstate\Models\County',
        'areas' => 'Robust\RealEstate\Models\Area',
        'high_schools' => 'Robust\RealEstate\Models\HighSchool'
    ];

    /**
     * @var const LOCATION_TYPES_WITH_SUBLOCATIONS
     */
    public const LOCATION_TYPES_WITH_SUBLOCATIONS = [
        'cities' => [
            'sub_location_type' => 'subdivisions',
            'field' => 'city_id',
            'location_type' => 'Robust\RealEstate\Models\Subdivision'
        ],
        'zips' => [
            'sub_location_type' => 'subdivisions',
            'field' => 'zip_id',
            'location_type' => 'Robust\RealEstate\Models\Subdivision'
        ],
        'school_districts' => [
            'sub_location_type' => 'subdivisions',
            'field' => 'school_district_id',
            'location_type' => 'Robust\RealEstate\Models\Subdivision'
        ]
    ];

    /**
     * @var const INSIGHTS
     */
    public const INSIGHTS = [
        " SUM( IF(status = 'Closed', 1, 0)) AS sold_count",
        " SUM( IF(status = 'Active', 1, 0)) AS active_count",
        " AVG(system_price) system_price_avg",
        " ROUND(AVG(days_on_mls), 0) as days_on_mls_avg",
        " ROUND(AVG(sold_price) / AVG(system_price) * 100, 2) as percent",
        " AVG(sold_price) sold_price_avg",
        " AVG(system_price) system_price_avg",
        " YEAR(input_date) year",
        " MONTH(input_date) month"
    ];

    /**
     * @var const INSIGHTS
     */
    public const INSIGHTS_COMPARE = [
        " SUM( IF(status = 'Closed', 1, 0)) AS sold_count",
        " SUM( IF(status = 'Active', 1, 0)) AS active_count",
        " AVG(system_price) system_price_avg",
        " ROUND(AVG(days_on_mls), 0) as days_on_mls_avg",
        " ROUND(AVG(sold_price) / AVG(system_price) * 100, 2) as percent",
        " AVG(sold_price) sold_price_avg",
        " AVG(system_price) system_price_avg",
        " real_estate_market_reports.name"
    ];
}
