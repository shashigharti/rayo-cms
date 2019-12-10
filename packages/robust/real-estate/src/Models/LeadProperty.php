<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadProperty
 * @package Robust\RealEstate\Models
 */
class LeadProperty extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_leads_properties';

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'type',
        'value',
    ];

}
