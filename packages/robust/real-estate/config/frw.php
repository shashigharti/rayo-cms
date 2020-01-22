<?php

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
    ],
    'default_pricing_ranges' => [
        ['min' => '10000', 'max' => '11000', 'count' => '0'],
        ['min' => '21000', 'max' => '31000', 'count' => '0'],
        ['min' => '41000', 'max' => '51000', 'count' => '0'],
        ['min' => '61000', 'max' => '71000', 'count' => '0'],
        ['min' => '71000', 'max' => '81000', 'count' => '0'],
        ['min' => '81000', 'max' => '91000', 'count' => '0'],
        ['min' => '91000', 'max' => '', 'count' => '0']
    ],
    'single_banner_tabs_properties_filter' => [
        'waterfront' => [
            'display_name' => 'Waterfront',
            'type' => 'price',
            'conditions' => [
                ['property_type' => 'waterfront', 'condition' => 'LIKE', 'values' => '']
            ]
        ],
        '55_plus' => [
            'display_name' => '55+',
            'type' => 'price',
            'conditions' => [
                ['property_type' => 'public_remarks', 'condition' => 'LIKE', 'values' => ''],
            ]
        ],
        'homes_with_land' => [
            'display_name' => 'Homes with Land',
            'type' => 'price',
            'conditions' => [
                ['property_type' => 'zoning', 'condition' => 'LIKE', 'values' => '']
            ]
        ],
        'pool_homes' => [
            'display_name' => 'Pool Homes',
            'type' => 'price',
            'conditions' => [
                ['property_type' => 'pool', 'condition' => 'LIKE', 'values' => '']
            ]
        ],
        'neighborhoods' => [
            'display_name' => 'Neighborhoods',
            'type' => 'neighborhoods'
        ]
    ]
];
