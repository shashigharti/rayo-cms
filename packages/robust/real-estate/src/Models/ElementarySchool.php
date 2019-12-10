<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class ElemSchool
 * @package Robust\Landmarks\Models
 */
class ElementarySchool extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_elementary_schools';

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
