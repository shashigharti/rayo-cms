<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |-------------------------------------y-------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */
    [
        'display_name' => 'Data Mapping',
        'slug' => 'data-mapping',
    ],
    [
        'display_name' => 'Advance Search',
        'slug' => 'advance-search',
        'property' => json_encode([
            'first_block' => ['property_type','status','pictures'],

            'second_block' => ['price','beds','bathrooms','cities','zips','subdivisions','waterfront','waterfront_details','pool'],
            'third_block' => [
                'lot_description',
                'design',
                'interior',
                'garage',
                'exterior',
                'year_built',
                'stories',
                'square_feet',
            ],
            'fourth_block' => [
                'elementary_schools',
                'middle_schools',
                'high_schools',
                'cities',
            ],
            'first_block_order' => 'property_type,status,pictures',
            'second_block_order' => 'price,beds,bathrooms,cities,zips,subdivisions,waterfront,waterfront_details,pool',
            'third_block_order' => 'lot_description,design,interior,garage,exterior,year_built,stories,square_feet',
            'fourth_block_order' => 'elementary_schools,middle_schools,high_schools,cities',
            'property_types' => [
                'Condominium',
                'Single Family Detached',
                'Townhomes',
                'Land and Lots',
                'Gated',
                '55+',
            ],
            'property_statuses' => [
                'Homes For sale',
                'Sold homes',
                'Contingent',
            ],
            'default_values' => [
                'property_type' => [
                    'Single Family Detached'
                ]
            ],
            'property_types_order' => 'Condominium,Single Family Detached,Townhomes,Land and Lots,Gated,55+',
            'property_statuses_order' => 'Homes For sale,Sold homes,Contingent',
        ])
    ],
    [
        'display_name' => 'Real Estate',
        'slug' => 'real-estate',
        'property' => json_encode([
            'application' => [
                'price' => [
                    'min' => 25000,
                    'max' => 5000000,
                    'increment' => 150000
                ]
            ],
           'market-report' => [
               'report-type' => ['cities', 'zips','school_districts']
           ]
        ])
    ],
    [
        'display_name' => 'Services',
        'slug' => 'services',
        'property' => json_encode([
            'data_pull' => [
                'status' => 'red, green',
                'last_executed_on' => '',
                'data_pulled' => '20',
            ]
        ])
    ],
    [
        'display_name' => 'Front Page',
        'slug' => 'front-page'
    ]
];
