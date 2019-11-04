<?php


namespace Robust\RealEstate\Models;


/**
 * Class Subdivision
 * @package Robust\Landmarks\Models
 */
class Subdivision
{
    /**
     * @var string
     */
    protected $table = 'subdivisions';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'city_id', 'county_id', 'zip_id', 'schooldistrict_id',
        'frontpage', 'active', 'sold', 'frontpage_order', 'menu_order', 'latitude',
        'longitude', 'area_id','group_name','group_slug'
    ];

    /**
     * @return mixed
     */
    public function listings()
    {
        return $this->hasMany('Robust\Mls\Models\Listing','subdivision','name');
    }
}
