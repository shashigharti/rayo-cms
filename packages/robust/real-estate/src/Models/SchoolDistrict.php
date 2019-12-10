<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class SchoolDistrict
 * @package Robust\LandMarks\Models
 */
class SchoolDistrict extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_school_districts';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'active', 'sold', 'front_page_order', 'menu_order', 'latitude', 'longitude','dropdown'
    ];
}
