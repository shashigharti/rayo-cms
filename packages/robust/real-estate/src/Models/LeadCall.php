<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Call
 * @package Robust\RealEstate\Models
 */
class LeadCall extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_calls';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id', 'agent_id', 'from', 'to', 'observations', 'lead_type', 'time_frame','call_datetime',
    ];
}
