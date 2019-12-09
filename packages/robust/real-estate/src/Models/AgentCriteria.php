<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class AgentCriteria
 * @package Robust\RealEstate\Models
 */
class AgentCriteria extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_agent_criterias';
    /**
     * @var string
     */
    protected $namespace = 'Robust\RealEstate\Models\AgentCriteria';

    /**
     * @var array
     */
    protected $fillable = ['id', 'name', 'content', 'reference_time'];

}
