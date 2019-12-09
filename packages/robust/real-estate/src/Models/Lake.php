<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Grid
 * @package Robust\Landmarks\Models
 */
class Lake extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_lakes';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'active',
        'sold',
        'city_id',
        'county_id',
        'zip_id',
        'school_district_id',
        'menu_order',
    ];

}
