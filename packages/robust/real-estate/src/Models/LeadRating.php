<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Rating
 * @package Robust\RealEstate\Models
 */
class LeadRating extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_ratings';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id','ratings'
    ];
}
