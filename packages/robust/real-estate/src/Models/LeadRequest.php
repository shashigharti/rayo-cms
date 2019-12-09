<?php

namespace Robust\RealEstate\Models;


use Robust\Core\Models\BaseModel;


/**
 * Class LeadRequest
 * @package Robust\RealEstate\Models
 */
class LeadRequest extends BaseModel
{


    /**
     * @var bool
     */
    public $timestamps = true;


    /**
     * @var string
     */
    protected $table = 'real_estate_lead_requests';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'agent_id',
        'listing_id',
        'comment',
        'type',
        'status',
        'subject',
        'body',
    ];

}
