<?php


namespace Robust\Landmarks\Models;


class Subdivision
{
    protected $table = 'subdivisions';

    protected $fillable = [
        'name', 'slug', 'city_id', 'county_id', 'zip_id', 'schooldistrict_id',
        'frontpage', 'active', 'sold', 'frontpage_order', 'menu_order', 'latitude',
        'longitude', 'area_id','group_name','group_slug'
    ];

    public function listings()
    {
        return $this->hasMany('Robust\Mls\Models\Listing','subdivision','name');
    }
}
