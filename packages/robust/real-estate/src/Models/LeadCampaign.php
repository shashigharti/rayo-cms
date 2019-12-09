<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadCampaign
 * @package Robust\RealEstate\Models
 */
class LeadCampaign extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_leads_campaigns';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id','campaign_id'
    ];
}
