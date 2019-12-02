<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Replies
 * @package Robust\RealEstate\Models
 */
class Replies extends BaseModel
{


    /**
     * @var string
     */
    protected $table = 'real_estate_leads_replies';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id', 'from', 'message_id', 'date', 'body_html', 'subject'
    ];
}
