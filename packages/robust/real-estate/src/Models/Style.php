<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Style
 * @package Robust\RealEstate\Models
 */
class Style extends BaseModel
{


    /**
     * @var string
     */
    protected $table = 'real_estate_styles';


    /**
     * @var array
     */
    protected $fillable = [
        'name','slug','status'
    ];
}
