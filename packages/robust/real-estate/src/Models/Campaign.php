<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Campaign
 * @package Robust\RealEstate\Models
 */
class Campaign extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_campaigns';


    /**
     * @var array
     */
    protected $fillable = [
        'user_id','name','campaign_type'
    ];
}
