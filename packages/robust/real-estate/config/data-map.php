<?php
return [
    'property_class' => [
        'A' => 'ResidentialProperty',
        'B' => 'MultiFamily',
        'C' => 'LotsAndLand',
        'D' => 'CommonInterest',
        'E' => 'Industry',
        'F' => 'Rental',
    ],
    'functions' => [
        'changePropertyClass' => [
            'class'
        ],
        'changeToJson' => [
            'amenities',
            'interior',
            'waterfrontview'
        ],
        'changeToInt' => [
            'total_finished_area',
            'system_price',
            'picture_count',
            'year_built',
            'bedrooms',
            'baths_full',
            'days_on_mls'
        ]
    ],
    'property' => [
        'listing' => [
            'A'=> [
                'name' => 'LIST_1',
                'slug' => 'LIST_1',
                'uid' => 'LIST_1',
                'mls_number' => 'LIST_105',
                'class' => 'LIST_8',
                'area' => 'LIST_29',
                'system_price' => 'LIST_22',
                'asking_price' => 'LIST_22',
                'address_number' => 'LIST_31',
                'address_street' => 'LIST_31',
                'city' => 'LIST_39',
                'state' => 'LIST_40',
                'zip' => 'LIST_43',
                'subdivision' => 'LIST_77',
                'county' => 'LIST_41',
                'elementary_school' => 'LIST_85',
                'middle_school' => 'LIST_32',
                'high_school' => 'LIST_73',
                'picture_count' => 'LIST_133',
                'input_date' => 'LIST_132',
                'baths_full' => 'LIST_68',
                'bedrooms' => 'LIST_66',
                'status' => 'LIST_15',
            ],
        ],
        'properties' => [
            'A' => [
                //property descriptions

                //interior
                'interior' => 'GF20121126194243819854000000',
                'rooms' => 'GF20121128194256026088000000',
                'furnished' => 'GF20121126194243781619000000',
                'flooring' => 'GF20121126194243841543000000',
                'amenities' => 'GF20121128203214100844000000',
                'kitchen_equipment' => 'ROOM_KI_room_rem',
                'baths_total'=> 'LIST_67',
                'baths_half' => 'LIST_69',
                'master_bath_bedroom' => 'GF20121128194227449710000000',
                'design' => 'GF20121126194243751321000000',
                'dining_area' => 'GF20121128203448419411000000',
                'equestrian_features' => 'GF20140321152154756346000000',
                'equipments' => 'GF20121128203422637850000000',
                'utilities' => 'GF20121126194244411580000000',

                //exterior
                'exterior' => 'GF20121126194243919925000000',
                'lot_description' => 'GF20121128194156807054000000',
                'parking' => 'GF20121128203155695117000000',
                'open_parking_space' => 'LIST_158',
                'pool' => 'LIST_109',
                'construction_status' => 'LIST_93',
                'construction' => 'GF20121126194243835004000000',
                'garage_spaces' => 'LIST_124',
                'security' => 'GF20121126194243879313000000',
                'special_info' => 'GF20121129160105603599000000',
                'roof_type' => 'GF20121126194243845568000000',
                'stories' => 'LIST_51',
                'carport_spaces' => 'LIST_119',
                'window_treatment' => 'GF20121128203631453311000000',
                'guest_house' => 'GF20121128203514053297000000',

                //Heating & cooling
                'cooling_type' => 'GF20121128203359274284000000',
                'heating_type' => 'GF20121126194243786373000000',

                //view information
                'view' => 'GF20121128190237228652000000',
                'waterfront' => 'LIST_108',
                'waterfront_details' => 'GF20121126194243720208000000',

                //street information
                'street_direction' => 'LIST_33',
                'street_name' => 'LIST_34',
                'street_post_dir' => 'LIST_36',
                'street_suffix' => 'LIST_37',


                // Address Information
                'directions' => 'LIST_82',
                'postal_code' => 'LIST_43',
                'address' => 'LIST_31',
                'unit_number' => 'LIST_35',
                'governing_bodies' => 'LIST_59',
                'zoning' => 'LIST_74',
                'building' => 'LIST_113',
                'geo_area' => 'LIST_86',
                'development_name' => 'LIST_130',
                'dock' => 'LIST_122',

                //size & dimensions
                'living_square_feet' => 'LIST_48',
                'total_square_feet' => 'LIST_49',
                'guest_house_square_feet' => 'LIST_50',
                'square_feet_source' => 'LIST_97',
                'lot_size' => 'LIST_118',
                'unit_floor' => 'LIST_123',
                'covered_space' => 'LIST_24',
                'lot_dimensions' => 'LIST_56',

                //extra information
                'days_on_mls' => 'LIST_137',
                'mls_approved' => 'LIST_4',
                'pets_allowed' => 'LIST_112',
                'pet_restriction' => 'GF20180201155859549336000000',
                'virtual_tour' => 'UNBRANDEDIDXVIRTUALTOUR',
                'mobile_features' => 'GF20121128190158529252000000',
                'possession' => 'GF20121128203750698912000000',

                //terms & fees
                'terms' => 'GF20121126194243889344000000',
                'home_owner_association' => 'LIST_91',
                'membership' => 'GF20121128203337846630000000',
                'membership_fee' => 'LIST_148',
                'front_exp' => 'LIST_58',
                'selling_info' => 'LIST_131',
                'multiple_offer' => 'LIST_115',
                'dual_rate' => 'LIST_116',
                'application_fee' => 'LIST_121',
                'list_price_per_square_feet' => 'LIST_125',
                'sold_price_per_square_feet' => 'LIST_126',
                'hopa' => 'LIST_96',
                'total_tax' => 'LIST_75',
                'tax_year' => 'LIST_76',
                'legal_description' => 'LIST_81',
                'maintenance_fee_inclusive' => 'GF20121128203245813130000000',
                'document_count' => 'LIST_162',
                'terms_of_sale' => 'LIST_28',


                //others
                'uid' => 'LIST_1',
                'property_group' => 'LIST_7',
                'list_agent' => 'LIST_5',
                'modification_date' => 'LIST_87',
                'property_type' => 'LIST_9',
                'expiration_date' => 'LIST_11',
                'closing_date' => 'LIST_12',
                'contract_date' => 'LIST_13',
                'fallthrough_date' => 'LIST_14',
                'status_change_date' => 'LIST_16',
                'temp_off_market_date' => 'LIST_17',
                'cancel_date' => 'LIST_18',
                'contingent' => 'LIST_19',
                'original_price' => 'LIST_21',
                'sold_price' => 'LIST_23',
                'latitude' => 'LIST_46',
                'longitude' => 'LIST_47',
                'year_built' => 'LIST_53',
                'short_sale_addendum' => 'LIST_54',
                'short_sale' => 'LIST_71',
                'hardship_package' => 'LIST_72',
                'public_remarks' => 'LIST_78',
                'owners_name' => 'LIST_83',
                'owners_phone' => 'LIST_84',
                'list_type' => 'LIST_88',
                'comm_brk' => 'LIST_89',
                'list_off_agency' => 'LIST_90',
                'model_name' => 'LIST_101',
                'special_assessment' => 'LIST_110',
                'short_sale_au' => 'LIST_113',
                'owner' => 'LIST_150',
                'auction' => 'LIST_154',
                'broker_advertise' => 'LIST_157',
                'update_date' => 'LIST_87',
                'modified' => 'LIST_87',
                'list_office' => 'listing_office_name',
                'selling_office' => 'selling_office_name',

                //Room dimensions
               'balcony_length' => 'ROOM_BL_room_length',
               'balcony_width' => 'ROOM_BL_room_width',
                'family_room_length' => 'ROOM_FR_room_length',
                'kitchen_length' => 'ROOM_KI_room_length',
                'kitchen_width' => 'ROOM_KI_room_width',
                'living_room_length' => 'ROOM_LV_room_length',
                'living_room_width' => 'ROOM_LV_room_width',
            ]
        ]

    ]
];
