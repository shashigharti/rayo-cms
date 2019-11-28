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
    protected $table = 'real_estate_leads';

    /**
     * @var string
     */
    protected $guard = 'lead';
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

    public function favourites()
    {
        return $this->belongsToMany(Listing::class,'real_estate_user_favourites','lead_id','listings_id')
            ->withoutGlobalScopes()->withPivot(['created_at','updated_at']);
    }

    public function bookmarks()
    {
        return $this->hasMany(BookMark::class);
    }

    public function reports()
    {
        return $this->hasMany(LeadReport::class);
    }

    public function searches()
    {
        return $this->hasMany(LeadSearch::class);
    }

    public function member()
    {
        return $this->morphOne('App\User', 'member');
    }

}
