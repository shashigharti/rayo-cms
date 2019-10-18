<?php

namespace Robust\LandMarks\Models;

use Robust\Core\Models\BaseModel;


class Area extends BaseModel
{
    protected $table = 'areas';

    protected $fillable = [
        'name', 'slug','frontpage', 'active', 'sold', 'frontpage_order', 'menu_order', 'hide_subdivs',
    ];
}
