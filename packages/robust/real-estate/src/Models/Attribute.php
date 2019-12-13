<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Attribute
 * @package Robust\RealEstate\Models
 */
class Attribute extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_attributes';


    /**
     * @var array
     */
    protected $fillable = [
        'name', 'display_name','values','status'
    ];
}
