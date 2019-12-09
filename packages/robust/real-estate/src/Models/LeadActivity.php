<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadActivity
 * @package Robust\RealEstate\Models
 */
class LeadActivity extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_leads_activities';


    /**
     * @var array
     */
    protected $fillable = [
       'lead_id',
       'activity',
    ];
}
