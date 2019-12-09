<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class AgentInteraction
 * @package Robust\RealEstate\Models
 */
class AgentInteraction extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_leads_agents_interactions';


    /**
     * @var array
     */
    protected $fillable = [
       'lead_id',
       'agent_id',
       'type_of_interaction',
       'content',
    ];
}
