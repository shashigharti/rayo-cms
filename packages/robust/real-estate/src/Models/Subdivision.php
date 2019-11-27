<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


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
        'name', 'slug', 'city_id', 'county_id', 'zip_id', 'schooldistrict_id',
        'frontpage', 'active', 'sold', 'frontpage_order', 'menu_order', 'latitude',
        'longitude', 'area_id','group_name','group_slug'
    ];

    /**
     * Get the city's report.
     */
    public function report()
    {
        return $this->morphOne('Robust\RealEstate\Models\MarketReport', 'reportable');
    }
}
