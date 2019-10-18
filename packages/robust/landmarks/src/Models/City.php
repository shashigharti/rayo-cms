<?php

namespace Robust\Landmarks\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class CoreSetting
 * @package App
 */
class City extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'cities';

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
        'hide_subdivs',
        'dropdown',
        'navigation',
        'marketreport',
        'delete',
        'latitude',
        'longitude'
    ];
}
