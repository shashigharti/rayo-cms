<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class MiddleSchool
 * @package Robust\RealEstate\Models
 */
class MiddleSchool extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_middle_schools';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

}
