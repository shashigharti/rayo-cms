<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadsNotification
 * @package Robust\RealEstate\Models
 */
class LeadsNotification extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_lead_notifications';


    /**
     * @var array
     */
    protected $fillable = [
       'id','lead_id','frequency',
       'type','zip','notified_at'
    ];

}
