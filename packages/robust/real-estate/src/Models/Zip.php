<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Zip
 * @package Robust\RealEstate\Models
 */
class Zip extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_zips';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'city_id',
        'county_id',
        'dropdown',
        'slug',
        'active',
        'sold',
        'menu_order',
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
      * @return \Illuminate\Database\Eloquent\Relations\MorphOne
      */
     public function location()
     {
         return $this->morphOne('Robust\RealEstate\Models\Location','locationable');
     }
}
