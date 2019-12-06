<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Construction
 * @package Robust\RealEstate\Models
 */
class Construction extends BaseModel
{


    /**
     * @var string
     */
    protected $table = 'real_estate_constructions';


    /**
     * @var array
     */
    protected $fillable = [
        'name','slug','status'
    ];
}
