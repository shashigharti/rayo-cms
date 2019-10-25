<?php

namespace Robust\Landmarks\Models;

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
        'active',
        'sold',
        'frontpage_order',
        'menu_order',
        'latitude',
        'longitude'
    ];
}
