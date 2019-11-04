<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


class HighSchool extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'high-schools';

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
