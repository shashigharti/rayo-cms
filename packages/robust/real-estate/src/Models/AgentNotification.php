<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class AgentNotification
 * @package Robust\RealEstate\Models
 */
class AgentNotification extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_agent_notifications';
    /**
     * @var string
     */
    protected $namespace = 'Robust\RealEstate\Models\AgentNotification';

    /**
     * @var array
     */
    protected $fillable = ['id', 'agent_id', 'name', 'read'];

}
