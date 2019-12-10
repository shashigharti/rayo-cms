<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadAlert
 * @package Robust\RealEstate\Models
 */
class LeadAlert extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_alerts';


    /**
     * @var array
     */
    protected $fillable = [
       'lead_id',
       'name',
       'type',
       'model',
       'frequency',
       'reference_time',
       'location',
       'sold',
       'active',
    ];
}
