<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Thumbnails
 * @package Robust\RealEstate\Models
 */
class Thumbnails extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_thumbnails';

    /**
     * @var array
     */
    protected $fillable = [
        'object_id',
        'object_type',
        'url',
    ];
}
