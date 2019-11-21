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
    protected $table = 'counties';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'frontpage',
        'dropdown',
        'active',
        'sold',
        'frontpage_order',
        'menu_order',
        'latitude',
        'longitude'
    ];
}
