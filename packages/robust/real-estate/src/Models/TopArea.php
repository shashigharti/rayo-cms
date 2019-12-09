<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class TopArea
 * @package Robust\RealEstate\Models
 */
class TopArea extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_top_areas';

    /**
     * @var array
     */
    protected $fillable = [
        'area_id',
        'type',
        'name',
        'slug',
        'median',
        'average',
        'sold',
        'active',
    ];
}
