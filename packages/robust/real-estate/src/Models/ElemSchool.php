<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class ElemSchool
 * @package Robust\Landmarks\Models
 */
class ElemSchool extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_elem_schools';

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
