<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadReport
 * @package Robust\RealEstate\Models
 */
class LeadReport extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_lead_reports';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id', 'name', 'frequency', 'content', 'type', 'url',
    ];
}
