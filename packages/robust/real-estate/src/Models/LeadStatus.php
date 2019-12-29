<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadStatus
 * @package Robust\RealEstate\Models
 */
class LeadStatus extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_lead_status';

    /**
     * @var array
     */
    protected $fillable = [
        'value',
    ];
}
