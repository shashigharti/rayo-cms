<?php

namespace Robust\LandMarks\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Area
 * @package Robust\LandMarks\Models
 */
class Area extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'areas';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug','frontpage', 'active', 'sold', 'frontpage_order', 'menu_order', 'hide_subdivs',
    ];
}
