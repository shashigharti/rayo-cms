<?php

namespace Robust\LandMarks\Models;

use Robust\Core\Models\BaseModel;


class SchoolDistrict extends BaseModel
{
    protected $table = 'school_districts';

    protected $fillable = [
        'name', 'slug', 'active', 'sold', 'frontpage_order', 'menu_order', 'latitude', 'longitude','dropdown'
    ];
}
