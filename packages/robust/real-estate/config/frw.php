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
        'zips' => 'Zips',
        'counties' => 'Counties',
        'school_districts' => 'School Districts'
    ]

];
