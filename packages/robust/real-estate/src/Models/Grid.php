<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Grid
 * @package Robust\Landmarks\Models
 */
class Grid extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'grids';

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
