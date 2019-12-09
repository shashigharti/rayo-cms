<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;



class Categories extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_categories';

    /**
     * @var array
     */
    protected $fillable = [
        'name','color'
    ];
}
