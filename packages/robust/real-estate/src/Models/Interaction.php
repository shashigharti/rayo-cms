<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Interaction
 * @package Robust\RealEstate\Models
 */
class Interaction extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_interactions';

    /**
     * @var array
     */
    protected $fillable = [
        'interaction_type',
    ];

}
