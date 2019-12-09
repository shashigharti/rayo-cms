<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Borough
 * @package Robust\RealEstate\Models
 */
class Borough extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_boroughs';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];
}
