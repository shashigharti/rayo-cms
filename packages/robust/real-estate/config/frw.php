<?php

use App\Area;
use App\City;
use App\County;
use App\HighSchool;
use App\SchoolDistrict;
use App\Subdivision;
use App\Zip;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */
    'single' => 'realestate',
    'website' => '',
    'frequency' => [
        'hourly' => 'Hourly',
        'daily' => 'Daily',
        'monday' => 'Monday',
        'tuesday' => 'Tuesday'
    ],
    'commands' => [
        [
            'name' => 'Robust\RealEstate\Console\Commands\UpdateListingNames',
            'description' => '',
            'command' => 'rws:update-listing-names',
            'status' => 1,
            'frequency' => 'hourly',
            'at' => '10:30'
        ],
        [
            'name' => 'Robust\RealEstate\Console\Commands\CreateAttributes',
            'description' => '',
            'command' => 'rws:create-attributes',
            'status' => 1,
            'frequency' => 'daily',
            'at' => '10:30'
        ]
    ],
    'settings' => [
        'advance-search' => [
            'property_types' => [
                'Single Family Detached',
                'Condominium',
                'Townhomes',
                'Land and Lots',
                'Gated',
                '55+'
            ],
            'property_statuses' => [
                'Homes For sale',
                'Sold homes',
                'Pending',
                'Contingent'
            ]
        ]
    ],
    'locations' => [
        'cities' => 'Cities',
        'zips' => 'Zip Codes',
        'counties' => 'Counties',
        'school_districts' => 'School Districts'
    ],
    'locations_id_maps' => [
        'cities' => 'city_id',
        'zips' => 'zip_id',
        'counties' => 'counties_id',
        'school_districts' => 'school_districts_id'
    ],
    'location_maps' => [
        'Robust\RealEstate\Models\City' => 'cities',
        'Robust\RealEstate\Models\Zip' => 'zips',
        'Robust\RealEstate\Models\County' => 'counties',
        'Robust\RealEstate\Models\HighSchool' => 'high_schools',
        'Robust\RealEstate\Models\ElementarySchool' => 'elementary_schools',
        'Robust\RealEstate\Models\MiddleSchool' => 'middle_schools',
        'Robust\RealEstate\Models\Subdivision' => 'subdivisions',
        'Robust\RealEstate\Models\SchoolDistrict' => 'school_districts',
    ],
    'default_pricing_ranges' => [
        ['min' => '150000', 'max' => '200000', 'count' => '0'],
        ['min' => '200000', 'max' => '400000', 'count' => '0'],
        ['min' => '400000', 'max' => '600000', 'count' => '0'],
        ['min' => '600000', 'max' => '800000', 'count' => '0'],
        ['min' => '750000', 'max' => '1000000', 'count' => '0'],
        ['min' => '800000', 'max' => '1000000', 'count' => '0'],
        ['min' => '1000000', 'max' => '2000000', 'count' => '0'],
        ['min' => '2000000', 'max' => '', 'count' => '0']
    ],
    'market-report' => [
        'fields-mapping' => [
            'square_footage' => 'square_footage',
            'year_built' => 'year_built',
            'lot_size' => 'lot_size',
            'acres' => 'acres',
            'stories' => 'stories'
        ],
        'fields_to_compare_list' => [
            'median_price_active' => 'Median Price Active',
            'average_price_active' => 'Average Price Active',
            'total_listings_active' => 'Total Listings Active'
        ]
    ],
    'single_banner_tabs_properties_filter' => [
        'waterfront' => [
            'display_name' => 'Waterfront',
            'type' => 'price',
            'conditions' => [
                ['property_type' => 'waterfront', 'condition' => 'LIKE', 'values' => []]
            ]
        ],
        '55_plus' => [
            'display_name' => '55+',
            'type' => 'price',
            'data_tags' => 'true',
            'input_type' => 'search_text',
            'conditions' => [
                ['property_type' => 'public_remarks', 'condition' => 'LIKE', 'values' => []],
            ]
        ],
        'homes_with_land' => [
            'display_name' => 'Homes with Land',
            'type' => 'price',
            'conditions' => [
                ['property_type' => 'zoning', 'condition' => 'LIKE', 'values' => []]
            ]
        ],
        'pool_homes' => [
            'display_name' => 'Pool Homes',
            'type' => 'price',
            'conditions' => [
                ['property_type' => 'pool', 'condition' => 'LIKE', 'values' => []]
            ]
        ],
        'neighborhoods' => [
            'display_name' => 'Neighborhoods',
            'type' => 'neighborhoods'
        ],
        'acerage' => [
            'display_name' => 'Lots & Acerage',
            'type' => 'price',
            'conditions' => [
                ['property_type' => 'acres', 'condition' => 'LIKE', 'values' => []]
            ]
        ]
    ]
];
