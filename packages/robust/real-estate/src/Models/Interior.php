<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Interior
 * @package Robust\RealEstate\Models
 */
class Interior extends BaseModel
{


    /**
     * @var string
     */
    protected $table = 'real_estate_interiors';


    /**
     * @var array
     */
    protected $fillable = [
        'name','slug','status'
    ];
}
