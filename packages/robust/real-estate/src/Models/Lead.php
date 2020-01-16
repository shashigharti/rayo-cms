<?php

namespace Robust\RealEstate\Models;

use Robust\Admin\Models\User;
use Robust\Core\Models\BaseModel;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Lead
 * @package Robust\Leads\Models
 */
class Lead extends Authenticatable
{
    /**
     * @var boolean
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'real_estate_leads';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'phone_number',
        'open_password',
        'agent_id',
        'deal_type',
        'last_active',
        'activation_status',
        'status_id',
        'ip',
        'agent_partner_assigned',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Get user
     */
    public function user()
    {
        return $this->morphOne('Robust\Admin\Models\User', 'memberable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }
}
