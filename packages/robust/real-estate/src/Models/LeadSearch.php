<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadReport
 * @package Robust\RealEstate\Models
 */
class LeadSearch extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_lead_search';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id', 'content', 'name', 'frequency', 'reference_time',
    ];
}
