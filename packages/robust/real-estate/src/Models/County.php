<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class County
 * @package Robust\LandMarks\Models
 */
class County extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_counties';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'active',
        'sold',
        'menu_order',
        'latitude',
        'longitude'
    ];
}
