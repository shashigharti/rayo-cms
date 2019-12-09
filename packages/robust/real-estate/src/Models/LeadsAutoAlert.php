<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadsAutoAlert
 * @package Robust\RealEstate\Models
 */
class LeadsAutoAlert extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_leads_auto_alerts';


    /**
     * @var array
     */
    protected $fillable = [
       'id','lead_id','last_sent_count'
    ];

}
