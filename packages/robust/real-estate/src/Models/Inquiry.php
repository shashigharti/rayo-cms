<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Inquiry
 * @package Robust\RealEstate\Models
 */
class Inquiry extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_inquiry';

    /**
     * @var array
     */
    protected $fillable = [
        'inquiry_type',
    ];

}
