<?php
return [
  'Property' => [
      'Property' => [ // Residential
          'listing_id' => 'ListingKeyNumeric',
          'uid' => 'ListingKeyNumeric',
          //'' => 'List_1'                                            // internal mls id, not sure what to use for
          'mls_number' => 'ListingId',
          'listing_name' => 'ListingId',                                // computed so setting temp value
          'listing_slug' => 'ListingId',                                // computed so setting temp value

          'class' => 'PropertyType',
          'property_setting' => 'PropertyType',
          'sub_property' => 'PropertySubType',                                  // Attached detached and stacked
          'sub_class' => 'PropertySubType',

          'closing_date' => 'CloseDate',
          'sold_price' => 'ClosePrice',

          'contract_date' => 'ListingContractDate',
          'status' => 'MlsStatus',
          'system_price' => 'CurrentPrice',
          'original_price' => 'ListPrice',

          'total_finished_area' => 'LivingArea',                         // lot sqft.

          'address_number' => 'StreetNumber',
          'address_street' => 'StreetName',
          'unit_number' => 'UnitNumber',
          'street_suffix' => 'StreetSuffix',
          'city' => 'City',
          'area' => 'MLSAreaMajor',
          'state' => 'StateOrProvince',
          'county' => 'CountyOrParish',
          'zip' => 'PostalCode',
          //'latitude' => 'LIST_46',
          //'longitude' => 'LIST_47',

          'year_built' => 'YearBuilt',

          'lot_dimensions' => 'LotSizeDimensions',
          'acres' => 'LotSizeAcres',
          'lot_description' => 'PropertyDescription',
          'lot_size' => 'LotSizeSquareFeet',

          'stories' => 'Levels',

          'bedrooms' => 'BedroomsTotal',
          'baths_full' => 'BathroomsTotalInteger',                                        // represents baths total, name is misleading
          // 'baths_half' => '',

          'zoning' => 'Zoning',

          'total_tax' => 'TaxAnnualAmount',
          'tax_year' => 'TaxYear',

          'subdivision' => 'SubdivisionName',
          'public_remarks' => 'PublicRemarks',

          'tax_database_id' => 'TaxBookNumber',                                   // not sure if both are the same
          'tax_property_id' => 'TaxLot',                                   // not sure if both are the same

          'directions' => 'Directions',

          'update_date' => 'ModificationTimestamp',
          'modified' => 'ModificationTimestamp',
          'input_date' => 'OriginalEntryTimestamp',


          'construction' => 'ConstructionMaterials',                                      // construction type
          'special_conditions' => 'SpecialListingConditions',
          'lot' => 'LotFeatures',
          //'district' => 'LIST_109', // school district
          'waterfrontview' => 'WaterView',                       // waterview name
          'waterfront_present' => 'WaterfrontYN',                   // waterfront present or not (y on n)
          'waterfront_name' => 'WaterBodyName',
          'water_description' => 'WaterfrontFeatures',
          'waterfront_footage' => 'WaterfrontFeetTotal',

          'hoa_amt' => 'MonthlyHOAAmount',
          'association_fee' => 'AssociationFee',
          'association_fee_includes' => 'AssociationFeeIncludes',
          'price_per_sqft' => 'PricePerAcre',                             // needs conversion
          'showing_instructions' => 'ShowingRequirements',
          'days_on_market' => 'CumulativeDaysOnMarket',

          'picture_count' => 'PhotosCount',

          'elem_school' => 'ElementarySchool',
          'middle_school' => 'MiddleOrJuniorSchool',
          'high_school' => 'HighSchool',

          'construction_status' => 'NewConstructionYN',                        // new or not

          'amenities' => 'AssociationAmenities',                    // another field is available names community amenities, both have similar values
          'parking' => 'GarageSpaces',
          'garage_desc' => 'ParkingFeatures',
          'equipment' => 'OtherEquipment',
          'cooling_type' => 'Cooling',
          'external_amenities' => 'ExteriorFeatures',                         // available in advanced search
          'fireplace' => 'FireplaceYN',
          'fireplace_type' => 'FireplaceFeatures',
          'flood_zone' => 'FloodZoneCode',
          'foundation_type' => 'FoundationDetails',
          'heating_type' => 'Heating',
          'interior' => 'InteriorFeatures',
          'pool' => 'PoolFeatures',
          'property_frontage' => 'RoadFrontageType',
          'roof_type' => 'Roof',

          'list_agent' => 'ListAgentFullName',
          'list_office' => 'ListOfficeName',
          'listings_office_name' => 'ListOfficeName',

          'selling_agent' => 'selling_member_name',
          'selling_office' => 'selling_office_shortid',
          'selling_office_name' => 'selling_office_name',

          'virtual_tour' => 'VirtualTourURLUnbranded',

          'building_name' => 'BuildingNameNumber',

          'off_market_date' => 'OffMarketDate',

          //------- new fields --------------
          'architectural_style' => 'ArchitecturalStyle',
          'pets' => 'PetsAllowed',
          'elderly' => 'SeniorCommunityYN',

      ],
  ]
];