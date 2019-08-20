<?php
namespace Robust\Leads\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class Page
 * @package Robust\Pages\Models
 */
class Lead extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'leads';

    /**
     * @var boolean
     */
    public $timestamps = true;


    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
        'open_password',
        'agent_id',
        'phone_number',
        'verified_phone_number',
        'address',
        'ip',
        'verified_email',
        'avatar',
        'user_type',
        'city',
        'state',
        'additional_email',
        'contact_status',
        'zip',
        'deal_type',
        'activation_status',
        'default_alert_frequency',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'password'
    ];

}
