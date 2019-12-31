<?php
namespace Robust\RealEstate\Repositories\Interfaces;

Interface IListings {
    /**
     * @var const LISTING_FIELDS
     */
	public const LISTING_FIELDS = [
        'index' => [
            'real_estate_listings.id','real_estate_listings.name',
            'real_estate_listings.uid','real_estate_listings.slug',
            'real_estate_listings.system_price','real_estate_listings.picture_count',
            'real_estate_listings.status','real_estate_listings.address_street','state',
            'real_estate_listings.baths_full','real_estate_listings.bedrooms',
            'real_estate_listings.city_id','real_estate_listings.county_id',
            'real_estate_listings.input_date'
        ]
    ];

    /**
     * @var const FIELDS_QUERY_MAP
     */
    public const FIELDS_QUERY_MAP = [
        'id' => ['name' => 'real_estate_listings.id', 'condition' => '='],
        'name' => ['name' => 'real_estate_listings.name', 'condition' => 'LIKE'],
        'uid' => ['name' => 'real_estate_listings.uid', 'condition' => 'LIKE'],
        'slug' => ['name' => 'real_estate_listings.slug', 'condition' => 'LIKE'],
        'status' => ['name' => 'real_estate_listings.status', 'condition' => '='],
        'baths_full' => ['name' => 'real_estate_listings.baths_full', 'condition' => '='],
        'bedrooms' => ['name' => 'real_estate_listings.bedrooms', 'condition' => '='],
        'city_id' => ['name' => 'real_estate_listings.city_id', 'condition' => '='],
        'zip_id' => ['name' => 'real_estate_listings.zip_id', 'condition' => '='],
        'county_id' => ['name' => 'real_estate_listings.county_id', 'condition' => '=']
    ];

    /**
     * @var const LOCATION_TYPE_MAP
     */
    public const LOCATION_TYPE_MAP = [
        'cities' => 'city_id',
        'zips' => 'zip_id',
        'counties' => 'county_id',
        'high_schools' => 'high_school_id',
        'elementary_schools' => 'elementary_school_id',
        'middle_schools' => 'middle_school_id'
    ];
}