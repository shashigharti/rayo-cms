<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class HighSchool
 * @package Robust\RealEstate\Models
 */
class HighSchool extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_high_schools';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'active',
        'sold',
    ];

}
