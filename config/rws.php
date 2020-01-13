<?php

return [
    'application' => [
        'price' => [
            'min' => 25000,
            'max' => 5000000,
            'increment' => 150000
        ]
    ],
    'override_event_notifications' => [
        'user_created' => 'Robust\RealEstate\Events\LeadCreatingEvent'
    ],
    'advance-search-filters' => [
        'price' => [
            'min' => 25000,
            'max' => 1000000,
            'increment' => 25000
        ]

    ],
    'map' => [
        'map-filters' => [
            'price' => [
                'min' => 25000,
                'max' => 1000000,
                'increment' => 25000
            ]
        ],
        'market-survey-tools' => [
            'search-filters' => [
                'sold' => [
                    'display' => 'Sold',
                    'values' => [
                        ['display' => 'Recently Sold 30 Days', 'value' => 'sold_date-30_days'],
                        ['display' => 'Recently Sold 60 Days', 'value' => 'sold_date-60_days'],
                        ['display' => 'Recently Sold 3 Months', 'value' => 'sold_date-3_months'],
                        ['display' => 'Recently Sold 6 Months', 'value' => 'sold_date-6_months'],
                        ['display' => 'Recently Sold 12 Months', 'value' => 'sold_date-12_months']
                    ]
                ]
            ]
        ]
    ],
    'market-report' => [
        'report-type' => [
            'cities' => 'City',
            'zips' => 'Zip Code',
            'school_districts' => 'School District'
        ],
        'price-range' => [
            'min' => 0,
            'max' => 44500000,
            'increment' => 1500000,
            'default' => ['average' => '3010000'],
            'field-to-compare' => 'median_price_active'
        ]
    ],
    'sorting' => [
        ['display' => 'Recently Added', 'value' => 'input_date-desc'],
        ['display' => 'Price High - Low', 'value' => 'system_price-asc'],
        ['display' => 'Price Low - High', 'value' => 'system_price-desc'],
        ['display' => 'Recently Sold 7 Days', 'value' => 'sold_date-7_days'],
        ['display' => 'Recently Sold 14 Days', 'value' => 'sold_date-14_days'],
        ['display' => 'Recently Sold 30 Days', 'value' => 'sold_date-30_days']
    ],
    'data' => [
        'listings-price' => [
            'min' => 10000,
            'condition' => '>=',
            'field-to-compare' => 'system_price'
        ],
        'timeframe' => "- 365 day"
    ],
    // third party server field mapping with listing properties
    'advance-search' => [
        'search' => [
            'blade' => 'search',
            'display_name' => 'Search'
        ],
        'property_type' => [
            'blade' => 'property_type',
            'display_name' => 'Property Type'
        ],
        'status' => [
            'blade' => 'status',
            'display_name' => 'Status'
        ],
        'pictures' => [
            'blade' => 'pictures',
            'display_name' => 'Pictures'
        ],
        'lot_description' => [
            'blade' => 'attributes-select-remote',
            'display_name' => 'Lot Description'
        ],
        'design' => [
            'blade' => 'attributes-select-remote',
            'display_name' => 'Architectural Style'
        ],
        'waterfront_details' => [
            'blade' => 'attributes-select-remote',
            'display_name' => 'Lot Water Features'
        ],
        'interior' => [
            'blade' => 'attributes-select-remote',
            'display_name' => 'Interior'
        ],
        'waterfront' => [
            'blade' => 'attributes-select-remote',
            'display_name' => 'Waterfront'
        ],
        'waterview' => [
            'blade' => 'attributes-select-remote',
            'display_name' => 'Waterview'
        ],
        'garage' => [
            'blade' => 'attributes-select-remote',
            'display_name' => 'Garage'
        ],
        'exterior' => [
            'blade' => 'attributes-select-remote',
            'display_name' => 'Exterior'
        ],
        'pool' => [
            'blade' => 'attributes-select-remote',
            'display_name' => 'Pool'
        ],
        'counties' => [
            'blade' => 'locations-select-remote',
            'display_name' => 'Counties'
        ],
        'subdivisions' => [
            'blade' => 'locations-select-remote',
            'display_name' => 'Subdivisions'
        ],
        'cities' => [
            'blade' => 'locations-select-remote',
            'display_name' => 'City'
        ],
        'zips' => [
            'blade' => 'locations-select-remote',
            'display_name' => 'Zip'
        ],
        'elementary_schools' => [
            'blade' => 'locations-select-remote',
            'display_name' => 'Elementary School'
        ],
        'middle_schools' => [
            'blade' => 'locations-select-remote',
            'display_name' => 'Middle School'
        ],
        'high_schools' => [
            'blade' => 'locations-select-remote',
            'display_name' => 'High School'
        ],
        'year_built' => [
            'blade' => 'year_built',
            'display_name' => 'Year Built(min-max)'
        ],
        'stories' => [
            'blade' => 'stories',
            'display_name' => 'Stories'
        ],
        'square_feet' => [
            'blade' => 'square_feet',
            'display_name' => 'Lot Square Feet (min - max)'
        ],
        'beds' => [
            'blade' => 'beds',
            'display_name' => 'Beds (min - max)'
        ],
        'price' => [
            'blade' => 'price',
            'display_name' => 'Price (min - max)'
        ],
        'bathrooms' => [
            'blade' => 'bathrooms',
            'display_name' => 'Bathrooms (min - max)'
        ]

    ]


];

?>
