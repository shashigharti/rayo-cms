<?php

namespace Robust\LandMarks\Models;

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
    protected $table = 'school_districts';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'active', 'sold', 'frontpage_order', 'menu_order', 'latitude', 'longitude','dropdown'
    ];
}
