<?php

return [
    // third party server field mapping with listing properties
    'advance-search' => [
        'lot_description' => [
            'blade' => 'attributes-single',
            'display_name' => 'Lot Description'
        ],
        'architectural_style' => [
            'blade' => 'attributes-single',
            'display_name' => 'Architectural Style'
        ],
        'lot_water_features' => [
            'blade' => 'attributes-single',
            'display_name' => 'Lot Water Features'
        ],
        'pool' => [
            'blade' => 'attributes-single',
            'display_name' => 'Pool'
        ],
        'counties' => [
            'blade' => 'locations',
            'display_name' => 'Counties'
        ],
        'cities' => [
            'blade' => 'locations',
            'display_name' => 'City'
        ],
        'zips' => [
            'blade' => 'locations',
            'display_name' => 'Zip'
        ],
        'elementary_schools' => [
            'blade' => 'locations',
            'display_name' => 'Elementary School'
        ],
        'middle_schools' => [
            'blade' => 'locations',
            'display_name' => 'Middle School'
        ],
        'high_schools' => [
            'blade' => 'locations',
            'display_name' => 'High School'
        ]
        
    ]

];

?>