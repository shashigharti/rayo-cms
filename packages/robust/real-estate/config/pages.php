<?php

return [
    'main' => [
        'active' => [
            'slug' => '{{homes_for_sale}}',
            'title' => '{{client_name}} Homes for Sale | {{client_name}} MLS Home Listings',
            'url' => '{{homes_for_sale}}',
            'meta_title' => '{{client_name}} Homes for Sale | {{client_name}} MLS Home Listings',
            'meta_description' => 'Search {{client_name}} Homes for Sale by all Brokerages. All {{client_name}} MLS Home Listings Updated Hourly. Single family, detached and semi detached {{client_name}} Homes.',
            'meta_keywords' => '{{client_name}} Single family Homes for Sale, Detached Homes  {{client_name}}, {{client_name}} MLS Homes, {{client_name}} Semi-detached Home listings',

        ],
        'sold' => [
            'slug' => '{{homes_sold}}',
            'title' => 'Recently Sold Homes in {{client_name}} | Homes Prices in {{client_name}}',
            'url' => '{{homes_sold}}',
            'meta_title' => 'Recently Sold Homes in {{client_name}} | Homes Prices in {{client_name}}',
            'meta_description' => 'Search {{client_name}} Recently Sold Homes. Prices for Single family, detached homes in {{client_name}}.',
            'meta_keywords' => '{{client_name}} Sold Homes,{{client_name}} Home Prices, Sold Single family, Homes {{client_name}}, {{client_name}} Home Market',
        ]
    ],
    'location_types' => [
        'cities' => [
            'active' => [
                'slug' => '{{homes_for_sale}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} {{state_cap}} Homes for Sale | {{name}} {{state_cap}} MLS Home Listings',
                'url' => '{{homes_for_sale}}/{{location_type}}/{{name}}',
                'meta_title' => '{{name}} {{state_cap}} Homes for Sale | {{name}} {{state_cap}} MLS Home Listings',
                'meta_description' => 'Search {{name}} {{state_cap}} Homes for Sale by all Brokerages. All {{name}} {{state_cap}} MLS Home Listings. MLS Updated Hourly {{name}}',
                'meta_keywords' => '{{name}} {{state_cap}} Homes for Sale, Homes in {{name}} {{state_cap}}, {{name}} {{state_cap}} MLS Homes, {{name}} {{state_cap}} Home listings, {{name}} {{state_cap}} Homes',
                'content' => '<h2>{{name}} Homes for Sale</h2> <h2>{{name}} MLS Home Listings</h2>'
            ],
            'sold' => [
                'slug' => '{{homes_sold}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} {{state_cap}} Sold Homes | {{name}} {{state_cap}} MLS Sold Homes Listings',
                'url' => '{{homes_sold}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} {{state_cap}} Sold Homes | {{name}} {{state_cap}} MLS Sold Homes Listings',
                'meta_description' => 'Search {{name}} {{state_cap}} Sold Homes by all Brokerages. All {{name}} {{state_cap}} MLS Sold Homes Listings. MLS Updated Hourly {{name}}',
                'meta_keywords' => '{{name}} {{state_cap}} Sold  Homes, Sold Homes in {{name}} {{state_cap}}, {{name}} {{state_cap}} MLS Sold Homes, {{name}} {{state_cap}} Sold Homes listings, {{name}} {{state_cap}} Sold Homes',
                'content' => '<h2>{{name}} Sold Homes</h2> <h2>{{name}} MLS Sold Homes Listings</h2>'
            ]
        ],
        'subdivisions' => [
            'active' => [
                'slug' => '{{homes_for_sale}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} Heights Subdivision in {{city_name}} {{state_cap}} Homes for Sale | {{name}} Heights Home Listings {{zip}}.',
                'url' => '{{homes_for_sale}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} Heights Subdivision in {{city_name}} {{state_cap}} Homes for Sale | {{name}} Heights Home Listings {{zip}}.',
                'meta_description' => 'Search {{name}} {{state_cap}} Homes for Sale by all Brokerages. All {{name}} {{state_cap}} MLS Home Listings. MLS Updated Hourly In {{name}}',
                'meta_keywords' => '{{name}} {{state_cap}} Homes for Sale, Homes in {{name}} {{state_cap}}, {{name}} {{state_cap}} MLS Homes, {{name}} {{state_cap}} Home listings, {{name}} {{state_cap}} Homes',
                'content' => '<h2>{{name}} Homes for Sale</h2> <h2>{{name}} MLS Home Listings</h2>'
            ],
            'sold' => [
                'slug' => '{{homes_sold}}-{{location_type}}-{{location_slug}}',
                'title' => 'Recently Sold Homes in {{name}} - {{city_name}} {{state_cap}} | {{name}} Homes Sold {{zip}}.',
                'url' => '{{homes_sold}}/{{location_type}}/{{location_slug}}',
                'meta_title' => 'Recently Sold Homes in {{name}} - {{city_name}} {{state_cap}} | {{name}} Homes Sold {{zip}}.',
                'meta_description' => 'Search {{name}} Recently Sold Homes.  {{name}} Home Prices, {{zip}}.',
                'meta_keywords' => '{{name}} {{state_cap}} Home Prices, Sold Homes, {{zip}} Homes Sold, {{name}} {{state_cap}} , Sold MLS Homes, {{name}} {{zip}} Sold Home listings',
                'content' => '<h2>{{name}} Sold Homes</h2> <h2>{{name}} MLS Sold Homes Listings</h2>'
            ]
        ],
        'zips' => [
            'active' => [
                'slug' => '{{homes_for_sale}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} Homes for Sale | {{name}} MLS Home Listings',
                'url' => '{{homes_for_sale}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} Homes for Sale | {{name}} MLS Home Listings',
                'meta_description' => 'Search {{name}} Homes for Sale by all Brokerages. All {{name}} MLS Home Listings in {{city_name}}, ({{state_cap}}) updated Hourly. Single family, detached and semi detached {{name}} Homes.',
                'meta_keywords' => '{{name}} Single family Homes for Sale, Detached Homes in {{name}}, {{name}} MLS Homes, {{name}} Semi-detached Home listings, {{name}} Homes',
                'content' => '<h2>{{name}} Zip {{state_cap}} Homes for Sale</h2> <h2>{{name}} Zip {{state_cap}} MLS Home Listings</h2>'
            ],
            'sold' => [
                'slug' => '{{homes_sold}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} Zip {{state_cap}} Sold Homes | {{name}} Zip {{state_cap}} MLS Sold Home Listings',
                'url' => '{{homes_sold}}/{{location_type}}/{{location_slug}}',
                'meta_title' => 'Recently Sold Homes in {{name}} | Home Prices in {{name}} , ({{state_cap}})',
                'meta_description' => 'Search {{name}} Recently Sold Homes. Sold Single family & detached Homes in {{name}}, {{city_name}}, ({{state_cap}}).',
                'meta_keywords' => '{{name}} Recently Sold Homes,{{name}} Home Prices, Sold Single family Homes {{name}}, {{name}} Home Market',
                'content' => '<h2>{{name}} Zip {{state_cap}} Homes for Sale</h2> <h2>{{name}} Zip {{state_cap}} MLS Sold Home Listings</h2>'
            ]
        ],
        'areas' => [
            'active' => [
                'slug' => '{{homes_for_sale}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} {{state_cap}} Homes for Sale | {{name}} {{state_cap}} MLS Home Listings',
                'url' => '{{homes_for_sale}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} {{state_cap}} Homes for Sale | {{name}} {{state_cap}} MLS Home Listings',
                'meta_description' => 'Search {{name}} {{state_cap}} Homes for Sale by all Brokerages. All {{name}} {{state_cap}} MLS Home Listings. MLS Updated Hourly In {{name}}',
                'meta_keywords' => '{{name}} {{state_cap}} Homes for Sale, Homes in {{name}} {{state_cap}}, {{name}} {{state_cap}} MLS Homes, {{name}} {{state_cap}} Home listings, {{name}} {{state_cap}} Homes',
                'content' => '<h2>{{name}} Homes for Sale</h2> <h2>{{name}} MLS Home Listings</h2>'
            ],
            'sold' => [
                'slug' => '{{homes_sold}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} {{state_cap}} Homes for Sale | {{name}} {{state_cap}} MLS Home Listings',
                'url' => '{{homes_sold}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} {{state_cap}} Homes for Sale | {{name}} {{state_cap}} MLS Home Listings',
                'meta_description' => 'Search {{name}} {{state_cap}} Homes for Sale by all Brokerages. All {{name}} {{state_cap}} MLS Home Listings. MLS Updated Hourly In {{name}}',
                'meta_keywords' => '{{name}} {{state_cap}} Homes for Sale, Homes in {{name}} {{state_cap}}, {{name}} {{state_cap}} MLS Homes, {{name}} {{state_cap}} Home listings, {{name}} {{state_cap}} Homes',
                'content' => '<h2>{{name}} Homes for Sale</h2> <h2>{{name}} MLS Home Listings</h2>'
            ]
        ],
        'counties' => [
            'active' => [
                'slug' => '{{homes_for_sale}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} County {{state_cap}} Homes for Sale | {{name}} County {{state_cap}} MLS Home Listings',
                'url' => '{{homes_for_sale}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} County {{state_cap}} Homes for Sale | {{name}} County {{state_cap}} MLS Home Listings',
                'meta_description' => 'Search {{name}} County {{state_cap}} Homes for Sale by all Brokerages. All {{name}} County {{state_cap}} MLS Home Listings. MLS Updated Hourly In {{name}} County {{state_cap}}',
                'meta_keywords' => '{{name}} County {{state_cap}} Homes for Sale, Homes in {{name}} County {{state_cap}}, {{name}} County {{state_cap}} MLS Homes, {{name}} County {{state_cap}} Home listings, {{name}} {{state_cap}} Homes',
                'content' => '<h2>{{name}} County {{state_cap}} Homes for Sale</h2> <h2>{{name}} County {{state_cap}} MLS Home Listings</h2>'
            ],
            'sold' => [
                'slug' => '{{homes_sold}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} County {{state_cap}} Sold Homes | {{name}} County {{state_cap}} MLS Sold Home Listings',
                'url' => '{{homes_sold}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} County {{state_cap}} Sold Homes | {{name}} County {{state_cap}} MLS Sold Home Listings',
                'meta_description' => 'Search {{name}} County {{state_cap}} Sold Homes by all Brokerages. All {{name}} County {{state_cap}} MLS Sold Home Listings. MLS Updated Hourly In {{name}} County {{state_cap}}',
                'meta_keywords' => '{{name}} County {{state_cap}} Sold Homes, Sold Homes in {{name}} County {{state_cap}}, {{name}} County {{state_cap}} MLS Sold Homes, {{name}} County {{state_cap}} Sold Home listings, {{name}} {{state_cap}} Sold Homes',
                'content' => '<h2>{{name}} County {{state_cap}} Sold Homes</h2> <h2>{{name}} County {{state_cap}} MLS Sold Home Listings</h2>'
            ]
        ],
        'school-districts' => [
            'active' => [
                'slug' => '{{homes_for_sale}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} School District Homes for Sale in {{city_name}} {{state_cap}}  | {{name}} School District MLS Home Listings {{zip}}',
                'url' => '{{homes_for_sale}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} School District Homes for Sale in {{city_name}} {{state_cap}} | {{name}} School District MLSHome Listings {{zip}}',
                'meta_description' => 'Search {{name}} School District Homes for Sale in {{city_name}} {{state_cap}}. All {{name}} School District MLS Home Listings in {{zip}} updated Hourly.',
                'meta_keywords' => '{{name}} School District, Homes for Sale, Homes in {{name}} School District, {{city_name}} {{state_cap}} MLS Homes, {{name}} School District Home listings, {{zip}} Homes',
                'content' => '<h2>{{name}} Homes for Sale</h2> <h2>{{name}} MLS Home Listings</h2>'
            ],
            'sold' => [
                'slug' => '{{homes_sold}}-{{location_type}}-{{location_slug}}',
                'title' => 'Recently Sold Homes in {{name}} School District | {{city_name}} {{state_cap}} Home Prices in {{name}} School District',
                'url' => '{{homes_sold}}/{{location_type}}/{{location_slug}}',
                'meta_title' => 'Recently Sold Homes in {{name}} School District | {{city_name}} {{state_cap}} Home Prices in {{name}} School District',
                'meta_description' => 'Search {{name}} School District Recently Sold Homes.  {{name}} School District Home Prices.',
                'meta_keywords' => '{{name}} School District Recently Sold Homes,{{name}} School District Home Prices, Sold Homes {{name}} School District, {{name}} School District Home Market',
                'content' => '<h2>{{name}} Sold Homes</h2> <h2>{{name}} MLS Sold Home Listings</h2>'
            ]
        ],
        'high-schools' => [
            'active' => [
                'slug' => '{{homes_for_sale}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} High School Homes for Sale in {{city_name}} {{state_cap}} | {{city_name}} {{state_cap}} {{zip}} MLS Home Listings',
                'url' => '{{homes_for_sale}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} High School Homes for Sale in {{city_name}} {{state_cap}} | {{city_name}} {{state_cap}} {{zip}} MLS Home Listings',
                'meta_description' => 'Search all {{name}} High School Homes for Sale. MLS Home Listings in {{city_name}} {{state_cap}} {{zip}} updated Hourly.',
                'meta_keywords' => '{{name}} High School, {{zip}} Homes for Sale, {{city_name}} {{state_cap}} schools, {{name}} High School District, {{zip}} Homes for Sale',
                'content' => '<h2>{{name}} High School Homes for Sale</h2> <h2>{{name}} MLS Home Listings</h2>'
            ],
            'sold' => [
                'slug' => '{{homes_sold}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} High School Recently Sold Homes | {{city_name}} {{state_cap}} {{zip}} Home Prices',
                'url' => '{{homes_sold}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} High School Recently Sold Homes | {{city_name}} {{state_cap}} {{zip}} Home Prices',
                'meta_description' => 'View all {{name}} High School Recently Sold Homes. Sold Home Listings in {{city_name}} {{state_cap}} {{zip}}.',
                'meta_keywords' => '{{name}} High School, {{zip}} Homes Sold, {{city_name}} {{state_cap}} schools, {{name}} High School District, {{zip}} Homes for Sale',
                'content' => '<h2>{{name}} High School Sold Homes</h2> <h2>{{name}} MLS Sold Home Listings</h2>'
            ]
        ],
        'middle-schools' => [
            'active' => [
                'slug' => '{{homes_for_sale}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} Middle School Homes for Sale in {{city_name}} {{state_cap}} | {{city_name}} {{state_cap}} {{zip}} MLS Home Listings',
                'url' => '{{homes_for_sale}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} Middle School Homes for Sale in {{city_name}} {{state_cap}} | {{city_name}} {{state_cap}} {{zip}} MLS Home Listings',
                'meta_description' => 'Search all {{name}} Middle School Homes for Sale. MLS Home Listings in {{city_name}} {{state_cap}} {{zip}} updated Hourly.',
                'meta_keywords' => '{{name}} Middle School, {{zip}} Homes for Sale, {{city_name}} {{state_cap}} schools, {{name}} Middle School District, {{zip}} Homes for Sale',
                'content' => '<h2>{{name}} Middle School Homes for Sale</h2> <h2>{{name}} MLS Home Listings</h2>'
            ],
            'sold' => [
                'slug' => '{{homes_sold}}-{{location_type}}-{{location_slug}}',
                'title' => '{{name}} Middle School Recently Sold Homes | {{city_name}} {{state_cap}} {{zip}} Home Prices',
                'url' => '{{homes_sold}}/{{location_type}}/{{location_slug}}',
                'meta_title' => '{{name}} Middle School Recently Sold Homes | {{city_name}} {{state_cap}} {{zip}} Home Prices',
                'meta_description' => 'View all {{name}} Middle School Recently Sold Homes. Sold Home Listings in {{city_name}} {{state_cap}} {{zip}}.',
                'meta_keywords' => '{{name}} Middle School, {{zip}} Homes Sold, {{city_name}} {{state_cap}} schools, {{name}} Middle School District, {{zip}} Homes for Sale',
                'content' => '<h2>{{name}} Middle School Sold Homes</h2> <h2>{{name}} MLS Sold Home Listings</h2>'
            ]
        ]
    ]
];
