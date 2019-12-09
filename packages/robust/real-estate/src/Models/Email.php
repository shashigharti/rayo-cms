<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Email
 * @package Robust\RealEstate\Models
 */
class Email extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_emails';


    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'campaign_id', 'template_id', 'schedule', 'schedule_type'
    ];
}
