<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class City
 * @package Robust\RealEstate\Models
 */
class City extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_cities';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'active',
        'sold',
        'menu_order',
        'sub_divs',
        'dropdown',
        'navigation',
        'market_report',
        'delete',
        'latitude',
        'longitude'
    ];

    /**
     * Get the city's report.
     */
    public function report()
    {
        return $this->morphOne('Robust\RealEstate\Models\MarketReport', 'reportable');
    }

    /**
     * Listing  associated with this city
     */
    public function listings()
    {
        return $this->hasMany('Robust\RealEstate\Models\Listing');
    }

    /**
     * Listing  associated with this city
     */
    public function subdivisions()
    {
        return $this->hasMany('Robust\RealEstate\Models\Subdivision');
    }
}
