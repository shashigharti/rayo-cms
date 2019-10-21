<?php

namespace Robust\Landmarks\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class MiddleSchool
 * @package Robust\Landmarks\Models
 */
class MiddleSchool extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'middle_schools';

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
