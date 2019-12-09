<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Template
 * @package Robust\RealEstate\Models
 */
class Template extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_templates';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'subject',
        'template',
    ];
}
