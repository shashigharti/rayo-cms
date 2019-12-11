<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;
use Robust\RealEstate\Models\Listing;


/**
 * Class Subdivision
 * @package Robust\Landmarks\Models
 */
class Subdivision extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_subdivisions';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'city_id', 'county_id', 'zip_id', 'school_district_id',
        'active', 'sold', 'menu_order', 'latitude',
        'longitude', 'area_id','group_name','group_slug'
    ];

    /**
     * Get the city's report.
     */
    public function report()
    {
        return $this->morphOne('Robust\RealEstate\Models\MarketReport', 'reportable');
    }

    /**
     * Get the city
     */
    public function city()
    {
        return $this->hasOne('Robust\RealEstate\Models\City');
    }

    /**
     * Get the listings
     */
    public function listings()
    {
        return $this->hasMany(Listing::class, 'subdivision', 'name');
    }
}
