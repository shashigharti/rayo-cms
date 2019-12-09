<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class CommonText
 * @package Robust\RealEstate\Models
 */
class CommonText extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_common_texts';


    /**
     * @var array
     */
    protected $fillable = [
        'location', 'content'
    ];

}
