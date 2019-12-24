<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class SchoolDistrict
 * @package Robust\RealEstate\Models
 */
class SchoolDistrict extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_school_districts';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];
}
