<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class UnsubscribedLead
 * @package Robust\RealEstate\Models
 */
class UnsubscribedLead extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_unsubscribed_leads';

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
    ];
}
