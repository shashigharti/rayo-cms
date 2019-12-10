<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Note
 * @package Robust\Leads\Models
 */
class LeadNote extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_lead_notes';

    /**
     * @var array
     */
    protected $fillable = [
        'agent_id',
        'lead_id',
        'title',
        'note',
    ];
}
