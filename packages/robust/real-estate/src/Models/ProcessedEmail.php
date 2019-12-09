<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class ProcessedEmail
 * @package Robust\RealEstate\Models
 */
class ProcessedEmail extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_processed_emails';


    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'campaign_id', 'template_id', 'schedule', 'schedule_type'
    ];
}
