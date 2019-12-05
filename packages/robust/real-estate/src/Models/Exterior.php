<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Exterior
 * @package Robust\RealEstate\Models
 */
class Exterior extends BaseModel
{


    /**
     * @var string
     */
    protected $table = 'real_estate_exteriors';


    /**
     * @var array
     */
    protected $fillable = [
        'name','slug','status'
    ];
}
