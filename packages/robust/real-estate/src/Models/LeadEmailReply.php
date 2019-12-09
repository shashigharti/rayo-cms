<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadEmailReply
 * @package Robust\RealEstate\Models
 */
class LeadEmailReply extends BaseModel
{


    /**
     * @var string
     */
    protected $table = 'real_estate_lead_email_replies';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id', 'from', 'message_id', 'date', 'body', 'subject'
    ];
}
