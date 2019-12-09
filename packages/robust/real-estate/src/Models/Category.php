<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Category
 * @package Robust\RealEstate\Models
 */
class Category extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_categories';


    /**
     * @var array
     */
    protected $fillable = [
       'name','color'
    ];

}
