<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class AgentProperty
 * @package Robust\RealEstate\Models
 */
class AgentProperty extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_agent_properties';
    /**
     * @var string
     */
    protected $namespace = 'Robust\RealEstate\Models\AgentProperty';

    /**
     * @var array
     */
    protected $fillable = ['id','type','value','listing_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->BelongsTo(Agent::class, 'agent_id');
    }
}
