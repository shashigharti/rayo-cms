<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Area
 * @package Robust\RealEstate\Models
 */
class Area extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_areas';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'active', 'sold', 'menu_order', 'sub_divs',
    ];
}
