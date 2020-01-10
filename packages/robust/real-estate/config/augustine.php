<?php
return [
    'data-pull' => [
        'property_class' => [
            'A' => 'Residential Property',
            'C' => 'Land',
            'D' => 'Rentals',
            'E' => 'Residential Income',
        ],
        'listing_fillable' => [
            'name',
            'slug',
            'uid',
            'mls_number',
            'class',
            'area',
            'sub_area',
            'borough_id',
            'system_price',
            'asking_price',
            'address_number',
            'address_street',
            'days_on_mls',
            'city',
            'zip',
            'state',
            'subdivision',
            'county',
            'elementary_school',
            'high_school',
            'middle_school',
            'picture_count',
            'picture_status',
            'input_date',
            'baths_full',
            'bedrooms',
            'status',
        ],
        'integer_fields' => [
            'total_finished_area',
            'system_price',
            'picture_count',
            'year_built',
            'bedrooms',
            'baths_full',
            'days_on_mls',
            'asking_price'
        ],
        'maps' => [
            'area' => 'area_id',
            'city' => 'city_id',
            'county' => 'county_id',
            'zip' => 'zip_id',
            'elementary_school' =>'elementary_school_id',
            'high_school' => 'high_school_id',
            'middle_school' => 'middle_school_id',
            'subdivision' => 'subdivision_id',
            'school_district' => 'school_district_id'
        ],
        'mapping' => [
            'city' => 'Robust\RealEstate\Models\City',
            'county' => 'Robust\RealEstate\Models\County',
            'area' => 'Robust\RealEstate\Models\Area',
            'elementary_school' => 'Robust\RealEstate\Models\ElementarySchool',
            'middle_school' => 'Robust\RealEstate\Models\MiddleSchool',
            'high_school' => 'Robust\RealEstate\Models\HighSchool',
            'zip' =>  'Robust\RealEstate\Models\Zip',
            'subdivision' =>  'Robust\RealEstate\Models\Subdivision',
            'school_district' =>  'Robust\RealEstate\Models\SchoolDistrict',
        ],
        'conditions' => [
            'cities' => [
                'A' => [
                    'ST AUGUSTINE' => 'B7ZMH3YQVOS',
                    'PONTE VEDRA' => 'M2T9W4VXLSH',
                    'PONTE VEDRA BEACH' => 'B7ZMH3YFU6G',
                    'JACKSONVILLE BEACH' => 'B7ZMH3XC516',
                ],
                'C' => [
                    'ST AUGUSTINE' => 'DRDEXVGWAKV',
                    'PONTE VEDRA' => 'M2T9W523W24',
                    'PONTE VEDRA BEACH' => 'ZS4XHGCVWD4',
                    'JACKSONVILLE BEACH' => 'ZS4XHGCN3W5',
                ],
                'D' => [
                    'ST AUGUSTINE' => 'DRJ2ZTTTS5B',
                    'PONTE VEDRA' => 'M2T9W524PD2',
                    'PONTE VEDRA BEACH' => 'ZS4XHGDEMJU',
                    'JACKSONVILLE BEACH' => 'ZS4XHGD7365',
                ],
                'E' => [
                    'ST AUGUSTINE' => 'DRGOCB41DYV',
                    'PONTE VEDRA' => 'M2T9W525GI6',
                    'PONTE VEDRA BEACH' => 'ZS4XHGDYBN0',
                    'JACKSONVILLE BEACH' => 'ZS4XHGDPNEV',
                ],
            ],
            'status' => [
                'A' => [
                    'Active' => 'B70IQH1IDA9',
                    'Sold' => 'B70IQH1K5FN',
                    'Contingent' => 'AWC_DUBTLU3ZTT7',
                    'Pending' => 'B70IQH1LELD',
                ],
                'C' => [
                    'Active' => 'DRDEXPHPHWJ',
                    'Sold' => 'DRDEXPHQA51',
                    'Contingent' => 'AWC_1G8OYIZWPFVO',
                    'Pending' => 'DRDEXPHR1VB',
                ],
                'D' => [
                    'Active' => 'DRJ2ZOL0NY2',
                    'Sold' => 'DRJ2ZOL1CX2',
                    'Contingent' => 'AWC_1G8OYIZWQS21',
                    'Pending' => 'DRJ2ZOL22ZN',
                ],
                'E' => [
                    'Active' => 'DRGOCAWJXKS',
                    'Sold' => 'DRGOCAWL26S',
                    'Contingent' => 'AWC_1G8OYIZWS51W',
                    'Pending' => 'DRGOCAWLX90',
                ]
            ]
        ],
        'conditions_map' => [
            'counties' => 'LIST_41', 'system_price' =>'LIST_22','cities' => 'LIST_39','status' => 'LIST_15'
        ],
        'min_price' => 10000,
        'limit' => 2000,
        'input' => 'LIST_87'
    ],
    'data-map'=>[
        'property' => [
            'listing' => [
                'A'=> [
                    'name' => 'LIST_1',
                    'slug' => 'LIST_1',
                    'uid' => 'LIST_1',
                    'mls_number' => 'LIST_105',
                    'class' => 'LIST_8',
                    'sub_type' => 'LIST_9',
                    'area' => 'LIST_29',
                    'system_price' => 'LIST_22',
                    'asking_price' => 'LIST_22',
                    'address_number' => 'LIST_31',
                    'address_street' => 'LIST_31',
                    'city' => 'LIST_39',
                    'state' => 'LIST_40',
                    'zip' => 'LIST_43',
                    'days_on_mls' => 'LIST_137',
                    'subdivision' => 'LIST_77',
                    'county' => 'LIST_41',
                    'elementary_school' => 'LIST_88',
                    'middle_school' => 'LIST_89',
                    'high_school' => 'LIST_90',
                    'picture_count' => 'LIST_133',
                    'input_date' => 'LIST_87',
                    'baths_full' => 'LIST_68',
                    'bedrooms' => 'LIST_66',
                    'status' => 'LIST_15',
                    'latitude' => 'LIST_46',
                    'longitude' => 'LIST_47',
                ],
                'C'=> [
                    'name' => 'LIST_1',
                    'slug' => 'LIST_1',
                    'uid' => 'LIST_1',
                    'mls_number' => 'LIST_105',
                    'class' => 'LIST_8',
                    'sub_type' => 'LIST_9',
                    'area' => 'LIST_29',
                    'system_price' => 'LIST_22',
                    'asking_price' => 'LIST_22',
                    'address_number' => 'LIST_31',
                    'address_street' => 'LIST_31',
                    'city' => 'LIST_39',
                    'state' => 'LIST_40',
                    'county' => 'LIST_41',
                    'zip' => 'LIST_43',
                    'days_on_mls' => 'LIST_137',
                    'subdivision' => 'LIST_77',
                    'elementary_school' => 'LIST_88',
                    'middle_school' => 'LIST_89',
                    'high_school' => 'LIST_90',
                    'picture_count' => 'LIST_133',
                    'input_date' => 'LIST_87',
                    'status' => 'LIST_15',
                    'latitude' => 'LIST_46',
                    'longitude' => 'LIST_47',
                ],
                'D'=> [
                    'name' => 'LIST_1',
                    'slug' => 'LIST_1',
                    'uid' => 'LIST_1',
                    'mls_number' => 'LIST_105',
                    'class' => 'LIST_8',
                    'sub_type' => 'LIST_9',
                    'area' => 'LIST_29',
                    'system_price' => 'LIST_22',
                    'asking_price' => 'LIST_22',
                    'address_number' => 'LIST_31',
                    'address_street' => 'LIST_31',
                    'city' => 'LIST_39',
                    'state' => 'LIST_40',
                    'zip' => 'LIST_43',
                    'days_on_mls' => 'LIST_137',
                    'subdivision' => 'LIST_77',
                    'county' => 'LIST_41',
                    'elementary_school' => 'LIST_88',
                    'middle_school' => 'LIST_89',
                    'high_school' => 'LIST_90',
                    'picture_count' => 'LIST_133',
                    'input_date' => 'LIST_87',
                    'baths_full' => 'LIST_68',
                    'bedrooms' => 'LIST_66',
                    'status' => 'LIST_15',
                    'latitude' => 'LIST_46',
                    'longitude' => 'LIST_47',
                ],
                'E'=> [
                    'name' => 'LIST_1',
                    'slug' => 'LIST_1',
                    'uid' => 'LIST_1',
                    'mls_number' => 'LIST_105',
                    'class' => 'LIST_8',
                    'sub_type' => 'LIST_9',
                    'area' => 'LIST_29',
                    'system_price' => 'LIST_22',
                    'asking_price' => 'LIST_22',
                    'address_number' => 'LIST_31',
                    'address_street' => 'LIST_31',
                    'city' => 'LIST_39',
                    'state' => 'LIST_40',
                    'zip' => 'LIST_43',
                    'days_on_mls' => 'LIST_137',
                    'subdivision' => 'LIST_77',
                    'county' => 'LIST_41',
                    'elementary_school' => 'LIST_88',
                    'middle_school' => 'LIST_89',
                    'high_school' => 'LIST_90',
                    'picture_count' => 'LIST_133',
                    'input_date' => 'LIST_87',
                    'baths_full' => 'LIST_68',
                    'bedrooms' => 'LIST_66',
                    'status' => 'LIST_15',
                    'latitude' => 'LIST_46',
                    'longitude' => 'LIST_47',
                ],
            ],
            'properties' => [
                'A' => [
                    //property descriptions

                    //interior
                    'interior' => 'GF20030226223927789385000000',
                    'amenities' => 'GF20030226223927789385000000',
                    'additional_equipment' => 'GF20030226223925901561000000',
                    'baths_total'=> 'LIST_67',
                    'baths_half' => 'LIST_69',
                    'design' => 'FEAT20121101184824061350000000',
                    'dining_area' => 'GF20030226223925313972000000',
                    'equipments' => 'GF20030228184016963251000000',
                    'utilities' => 'GF20030226223931411163000000',

                    //features
                    'complex_features' => 'GF20030226223930354490000000',
                    'energy_features' => 'GF20030226223930665208000000',
                    'smart_features' => 'GF20170627201404702844000000',
                    'smart_features_other' => 'FEAT20171105180819825865000000',

                    //flooring
                    'dining_room_flooring' => 'ROOM_DIN_room_nbr',
                    'family_room_flooring' => 'ROOM_FAM_room_nbr',
                    'kitchen_room_flooring' => 'ROOM_KIT_room_nbr',
                    'living_room_flooring' => 'ROOM_LIV_room_nbr',
                    'master_bedroom_flooring' => 'ROOM_BD1_room_nbr',
                    'other_flooring' => 'ROOM_OTH_room_nbr',

                    //exterior
                    'exterior' => 'GF20030226223934789160000000',
                    'wall' => 'GF20061101134252098174000000',
                    'structure' => 'GF20030226223933328883000000',
                    'lot_description' => 'GF20030226223938465518000000',
                    'parking' => 'GF20030226223936808977000000',
                    'pool' => 'GF20030226223936396599000000',
                    'construction_status' => 'LIST_96',
                    'construction' => 'GF20030227010650718647000000',
                    'garage_spaces' => 'FEAT20151013152157223933000000',
                    'carport_spaces' => 'FEAT20151013152230766399000000',
                    'security' => 'GF20191030091321456613000000',
                    'roof_type' => 'GF20030226223934316859000000',
                    'stories' => 'LIST_198',
                    'fencing' => 'GF20030305220206873663000000',

                    //Heating & cooling
                    'cooling_type' => 'GF20030226223930163349000000',
                    'heating_type' => 'GF20030226223929852543000000',
                    'dwelling_type' => 'GF20030226223922292850000000',
                    'fireplaces' => 'GF20030226223929026171000000',

                    //view information
                    'waterfront' => 'LIST_95',
                    'waterfront_details' => 'GF20020923141755529165000000',

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
                    'zoning' => 'GF20030305180243592752000000',
                    'builder_name' => 'FEAT20030326032241373388000000',

                    //size & dimensions
                    'square_feet_source' => 'GF20030226223924178856000000',
                    'lot_size' => 'LIST_56',
                    'lot_dimensions' => 'LIST_56',

                    //terms & fees
                    'association_fee' => 'LIST_26',
                    'association_fee_frequency' => 'LIST_26',
                    'transfer_fee' => 'LIST_44',
                    'condo_fees' => 'LIST_70',
                    'cdd_fee_status' => 'LIST_115',
                    'cdd_fee' => 'LIST_117',
                    'cdd_fee_frequency' => 'LIST_107',
                    'documents_on_file' => 'GF20030226223942637168000000',
                    'financing' => 'LIST_28',


                    //others
                    'uid' => 'LIST_1',
                    'list_agent' => 'LIST_5',
                    'modification_date' => 'LIST_87',
                    'closing_date' => 'LIST_12',
                    'contract_date' => 'LIST_13',
                    'status_change_date' => 'LIST_16',
                    'contingent' => 'LIST_19',
                    'sold_price' => 'LIST_23',
                    'year_built' => 'LIST_53',
                    'block' => 'LIST_54',
                    'public_remarks' => 'LIST_78',
                    'gated_community' => 'LIST_84',
                    'update_date' => 'LIST_87',
                    'modified' => 'LIST_87',
                    'list_office' => 'listing_office_name',
                    'selling_office' => 'selling_office_name',


                    //Room dimensions
                    'breakfast_room_length' => 'ROOM_BRK_room_length',
                    'breakfast_room_width' => 'ROOM_BRK_room_width',
                    'breakfast_room_area' => 'ROOM_BRK_room_area',
                    'dining_room_length' => 'ROOM_DIN_room_length',
                    'dining_room_width' => 'ROOM_DIN_room_width',
                    'dining_room_area' => 'ROOM_DIN_room_area',
                    'family_room_length' => 'ROOM_FAM_room_length',
                    'family_room_width' => 'ROOM_FAM_room_width',
                    'family_room_area' => 'ROOM_FAM_room_area',
                    'kitchen_room_length' => 'ROOM_KIT_room_length',
                    'kitchen_room_width' => 'ROOM_KIT_room_width',
                    'kitchen_room_area' => 'ROOM_KIT_room_area',
                    'living_room_length' => 'ROOM_LIV_room_length',
                    'living_room_width' => 'ROOM_LIV_room_width',
                    'living_room_area' => 'ROOM_LIV_room_area',
                    'master_bedroom_length' => 'ROOM_BD1_room_length',
                    'master_bedroom_width' => 'ROOM_BD1_room_width',
                    'master_bedroom_area' => 'ROOM_BD1_room_area',

                    //extra information
                    'virtual_tour' => 'UNBRANDEDIDXVIRTUALTOUR',
                    'road_frontage' => 'GF20030305220303003689000000',
                    'road_surface' => 'GF20030305220326457642000000',
                    'occupancy' => 'GF20030306165225382102000000',
                    'mobile_home' => 'LIST_27',
                    'navgble_to_ocean' => 'LIST_91',
                    'region' => 'LIST_93',
                    'intermediate_school' => 'LIST_145',
                    'unit_layout' => 'GF20191030091319090468000000',
                    'unit_location' => 'GF20191030091320386615000000'
                ],
                'C' => [
                    //property descriptions

                    //features
                    'complex_features' => 'GF20030310024242393113000000',

                    //legal description
                    'section' => 'FEAT20030311183954886938000000',
                    'town' => 'FEAT20030311184006675967000000',
                    'range' => 'FEAT20030311184018811717000000',

                    //exteriors
                    'water_main' => 'FEAT20030311183918049959000000',
                    'sewer_main' => 'FEAT20030311183938639447000000',
                    'buildings' => 'GF20030310144059848163000000',
                    'fencing' => 'GF20030310024250779761000000',

                    //view information
                    'waterfront' => 'LIST_95',
                    'waterfront_details' => 'GF20030310024252785856000000',

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
                    'zoning' => 'LIST_74',

                    //size & dimensions
                    'lot_size' => 'LIST_56',
                    'lot_dimensions' => 'LIST_56',
                    'total_acreage' => 'LIST_57',

                    //terms & fees
                    'association_fee' => 'LIST_26',
                    'association_fee_frequency' => 'LIST_101',
                    'cdd_fee_status' => 'LIST_115',
                    'cdd_fee' => 'LIST_117',
                    'other_fees' => 'LIST_119',
                    'documents_on_file' => 'GF20030310024302234720000000',


                    //others
                    'uid' => 'LIST_1',
                    'list_agent' => 'LIST_5',
                    'modification_date' => 'LIST_87',
                    'closing_date' => 'LIST_12',
                    'status_change_date' => 'LIST_16',
                    'contingent' => 'LIST_19',
                    'sold_price' => 'LIST_23',
                    'block' => 'LIST_54',
                    'public_remarks' => 'LIST_78',
                    'update_date' => 'LIST_87',
                    'modified' => 'LIST_87',
                    'list_office' => 'listing_office_name',
                    'selling_office' => 'selling_office_name',

                    //extra information
                    'virtual_tour' => 'UNBRANDEDIDXVIRTUALTOUR',
                    'road_frontage' => 'GF20030310024308154024000000',
                    'road_surface' => 'GF20030310024307813311000000',
                    'occupancy' => 'GF20030310024302951804000000',
                    'financing' => 'LIST_28',
                    'navgble_to_ocean' => 'LIST_91',
                    'region' => 'LIST_93',
                    'presently_zoned' => 'GF20030310024306596098000000'
                ],
                'D' => [
                    //property descriptions

                    //interior
                    'interior' => 'GF20030326015006456699000000',
                    'amenities' => 'GF20030326015006456699000000',
                    'baths_full' => 'LIST_68',
                    'baths_half' => 'LIST_69',
                    'design' => 'GF20030326015035381127000000', //style
                    'dining_area' => 'GF20030326015011172738000000',
                    'equipments' => 'GF20030326015024306988000000',//major appliance
                    'utilities' => 'GF20030326015037824669000000',

                    //features
                    'complex_features' => 'GF20030326015008757524000000',
                    'energy_features' => 'GF20030326015013958574000000',
                    'smart_features' => 'GF20171106191018154226000000',
                    'smart_features_other' => 'FEAT20171106193238284456000000',

                    //flooring
                    'dining_room_flooring' => 'ROOM_DIN_room_nbr',
                    'family_room_flooring' => 'ROOM_FAM_room_nbr',
                    'kitchen_room_flooring' => 'ROOM_KIT_room_nbr',
                    'living_room_flooring' => 'ROOM_LIV_room_nbr',
                    'master_bedroom_flooring' => 'ROOM_BD1_room_nbr',
                    'other_flooring' => 'ROOM_OTH_room_nbr',

                    //exterior
                    'exterior' => 'GF20040625154623314091000000',
                    'wall' => 'GF20061101132330909919000000',
                    'structure' => 'GF20030326015014974182000000',
                    'lot_description' => 'GF20030326015022117815000000',
                    'parking' => 'GF20030326015019402171000000',
                    'pool' => 'GF20030326015027166546000000',
                    'garage_spaces' => 'FEAT20151020123604885417000000',
                    'carport_spaces' => 'FEAT20151020123625076456000000',
                    'roof_type' => 'GF20030326015032477026000000',
                    'stories' => 'FEAT20151020123718781477000000',
                    'fencing' => 'GF20030326015016683918000000',

                    //Heating & cooling
                    'cooling_type' => 'GF20030326015010776935000000',
                    'heating_type' => 'GF20030326015020879240000000',
                    'dwelling_type' => 'GF20030326015036881057000000',
                    'fireplaces' => 'GF20030326015017699570000000',

                    //view information
                    'waterfront' => 'LIST_95',
                    'waterfront_details' => 'GF20030326015018607749000000',

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

                    //terms & fees
                    'association_fee' => 'LIST_26',
                    'application_fee' => 'LIST_113',
                    'deposit_per_period' => 'FEAT20030327193642354064000000',
                    'min_lease' => 'FEAT20030327193711481483000000',
                    'percentage_of_tax' => 'FEAT20030327193759660647000000',
                    'security_deposit' => 'FEAT20030327193847488723000000',
                    'alt_rent_amount' => 'FEAT20030327193913850802000000',
                    'key_deposit' => 'FEAT20030327193926601699000000',
                    'reservation' => 'FEAT20030327193939552049000000',
                    'pet' => 'FEAT20030327193956750928000000',
                    'cleaning_fee' => 'FEAT20030327194011913616000000',
                    'financing' => 'LIST_28',


                    //others
                    'uid' => 'LIST_1',
                    'list_agent' => 'LIST_5',
                    'modification_date' => 'LIST_87',
                    'closing_date' => 'LIST_12',
                    'status_change_date' => 'LIST_16',
                    'sold_price' => 'LIST_23',
                    'year_built' => 'LIST_53',
                    'public_remarks' => 'LIST_78',
                    'gated_community' => 'LIST_84',
                    'update_date' => 'LIST_87',
                    'modified' => 'LIST_87',
                    'list_office' => 'listing_office_name',
                    'selling_office' => 'selling_office_name',


                    //Room dimensions
                    'breakfast_room_length' => 'ROOM_BRK_room_length',
                    'breakfast_room_width' => 'ROOM_BRK_room_width',
                    'breakfast_room_area' => 'ROOM_BRK_room_area',
                    'dining_room_length' => 'ROOM_DIN_room_length',
                    'dining_room_width' => 'ROOM_DIN_room_width',
                    'dining_room_area' => 'ROOM_DIN_room_area',
                    'family_room_length' => 'ROOM_FAM_room_length',
                    'family_room_width' => 'ROOM_FAM_room_width',
                    'family_room_area' => 'ROOM_FAM_room_area',
                    'kitchen_room_length' => 'ROOM_KIT_room_length',
                    'kitchen_room_width' => 'ROOM_KIT_room_width',
                    'kitchen_room_area' => 'ROOM_KIT_room_area',
                    'living_room_length' => 'ROOM_LIV_room_length',
                    'living_room_width' => 'ROOM_LIV_room_width',
                    'living_room_area' => 'ROOM_LIV_room_area',
                    'master_bedroom_length' => 'ROOM_BD1_room_length',
                    'master_bedroom_width' => 'ROOM_BD1_room_width',
                    'master_bedroom_area' => 'ROOM_BD1_room_area',

                    //extra information
                    'virtual_tour' => 'UNBRANDEDIDXVIRTUALTOUR',
                    'road_frontage' => 'GF20030326015033300521000000',
                    'road_surface' => 'GF20030326015032985047000000',
                    'occupancy' => 'GF20030326015028403983000000',
                    'navgble_to_ocean' => 'LIST_91',
                    'region' => 'LIST_93',
                    'unit_location' => 'GF20030327214422174377000000'
                ],
                'E' => [
                    //property descriptions

                    //interior
                    'interior' => 'GF20030320035137787542000000',
                    'amenities' => 'GF20030320035137787542000000',
                    'additional_equipment' => 'GF20030320035104163294000000',
                    'baths_total'=> 'LIST_67',
                    'baths_half' => 'LIST_69',
                    'equipments' => 'GF20030320035047690410000000',
                    'utilities' => 'GF20030319224859719179000000',

                    //features
                    'energy_features' => 'GF20030319224829745439000000',
                    'smart_features' => 'GF20171106193735140849000000',
                    'smart_features_other' => 'FEAT20171106195032672439000000',

                    //exterior
                    'wall' => 'GF20061101144519601926000000',
                    'structure' => 'GF20030319224831670909000000',
                    'lot_description' => 'FEAT20030319224842488140000000',
                    'parking' => 'GF20030319224835368134000000',
                    'pool' => 'GF20030320035500613974000000',
                    'garage_spaces' => 'FEAT20151020124142211762000000',
                    'carport_spaces' => 'FEAT20151020124124956230000000',
                    'roof_type' => 'GF20030319224851734627000000',
                    'stories' => 'GF20120605153456177381000000',

                    //Heating & cooling
                    'cooling_type' => 'GF20030320035207723008000000',
                    'heating_type' => 'GF20030320035151764176000000',
                    'fireplaces' => 'GF20030320035116312004000000',

                    //view information
                    'waterfront' => 'LIST_95',
                    'waterfront_details' => 'GF20030319224834542638000000',

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

                    //size & dimensions
                    'square_feet_source' => 'GF20030319224853575183000000',
                    'lot_size' => 'LIST_56',
                    'lot_dimensions' => 'LIST_56',

                    //annual fee & income
                    'occupancy_rate' => 'FEAT20030324024524352298000000',
                    'management_fee' => 'FEAT20030324024818229070000000',
                    'property_tax' => 'FEAT20030324024838356500000000',
                    'utilities_expenses' => 'FEAT20030324024858255110000000',
                    'insurance_expenses' => 'FEAT20030324024917331508000000',
                    'misc_income' => 'FEAT20030324024931229993000000',
                    'operating_expenses' => 'FEAT20030324024947443427000000',
                    'lease_payments' => 'FEAT20030324025010194912000000',
                    'grs_pot_annual_rent' => 'FEAT20030612130547862680000000',
                    'exist_rental_income' => 'FEAT20060925134517075058000000',


                    //others
                    'uid' => 'LIST_1',
                    'list_agent' => 'LIST_5',
                    'modification_date' => 'LIST_87',
                    'closing_date' => 'LIST_12',
                    'status_change_date' => 'LIST_16',
                    'contingent' => 'LIST_19',
                    'sold_price' => 'LIST_23',
                    'year_built' => 'LIST_53',
                    'block' => 'LIST_54',
                    'public_remarks' => 'LIST_78',
                    'update_date' => 'LIST_87',
                    'modified' => 'LIST_87',
                    'list_office' => 'listing_office_name',
                    'selling_office' => 'selling_office_name',

                    //extra information
                    'virtual_tour' => 'UNBRANDEDIDXVIRTUALTOUR',
                    'road_frontage' => 'GF20030319224852691495000000',
                    'road_surface' => 'GF20030319224852338017000000',
                    'occupancy' => 'FEAT20151110203445418845000000',
                    'navgble_to_ocean' => 'LIST_91',
                    'region' => 'LIST_93',
                    'total_units' => 'FEAT20030319224859649146000000',
                    'building_stories' => 'GF20030319224854926947000000',
                ],
            ]

        ]
    ]
];
