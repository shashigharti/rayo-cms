<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;



class Condition extends BaseModel
{


    /**
     * @var string
     */
    protected $table = 'real_estate_conditions';


    /**
     * @var array
     */
    protected $fillable = [
        'name','slug','status'
    ];
}
