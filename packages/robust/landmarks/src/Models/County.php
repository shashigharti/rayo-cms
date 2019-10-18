<?php

namespace Robust\LandMarks\Models;

use Robust\Core\Models\BaseModel;


class County extends BaseModel
{
    protected $table = 'counties';

    protected $fillable = [
        'name',
        'slug',
        'frontpage',
        'active',
        'sold',
        'frontpage_order',
        'menu_order',
        'latitude',
        'longitude'
    ];
}
