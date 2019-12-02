<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Call
 * @package Robust\RealEstate\Models
 */
class Rating extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_leads_ratings';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id','rating'
    ];
}
