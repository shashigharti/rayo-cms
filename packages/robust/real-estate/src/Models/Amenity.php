<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Amenity
 * @package Robust\RealEstate\Models
 */
class Amenity extends BaseModel
{


    /**
     * @var string
     */
    protected $table = 'real_estate_amenities';


    /**
     * @var array
     */
    protected $fillable = [
        'name','slug','status'
    ];
}
