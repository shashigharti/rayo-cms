<?php

namespace Robust\RealEstate\Models;

use Robust\Admin\Models\User;
use Robust\Core\Models\BaseModel;


/**
 * Class Lead
 * @package Robust\Leads\Models
 */
class Lead extends BaseModel
{
    /**
     *
     */
    const DISCARDED = 'discarded';
    /**
     *
     */
    const ACTIVE = 'active';
    /**
     *
     */
    const ARCHIVED = 'archived';
    /**
     * @var boolean
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'leads';
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
        'phone_number_2',
        'phone_number_3',
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

    /**
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function metadata()
    {
        return $this->hasOne(LeadMetadata::class, 'lead_id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loginHistory()
    {
        return $this->hasMany(UserLoginHistory::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activityLog()
    {
        return $this->hasMany(Activity::class, 'causer_id', 'id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lead_category()
    {
        return $this->hasOne(LeadCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany(SentEmails::class, 'lead_id', 'id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(UserReport::class, 'user_id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function searches()
    {
        return $this->hasMany(UserSearch::class, 'user_id')->latest();
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(LeadCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany(Note::class, 'lead_id', 'id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unsubscribed()
    {
        return $this->hasOne(Unsubscribed::class);
    }

    /**
     * @return mixed
     */
    public function getAgent()
    {
        $agentObj = $this->agent;
        if (!$agentObj) {
            $agentObj = User::getDefaultAgent();
        }
        return $agentObj;
    }

}
