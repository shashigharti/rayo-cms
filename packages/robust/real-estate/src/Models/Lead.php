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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favourites()
    {
        return $this->belongsToMany(Listing::class,'real_estate_user_favourites','lead_id','listings_id')
            ->withoutGlobalScopes()->withPivot(['created_at','updated_at']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookmarks()
    {
        return $this->hasMany(BookMark::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(LeadReport::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function searches()
    {
        return $this->hasMany(LeadSearch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function member()
    {
        return $this->morphOne('App\User', 'member');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function metadata()
    {
        return $this->hasOne(LeadMetadata::class,'lead_id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function search()
    {
        return $this->hasMany(LeadSearch::class,'lead_id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(LeadCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function email()
    {
        return $this->hasMany(SentEmails::class, 'lead_id', 'id')->latest();
    }

    public function emails()
    {
        return $this->hasMany(SentEmails::class, 'lead_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function note()
    {
        return $this->hasMany(Note::class, 'lead_id', 'id')->latest();
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'lead_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activityLog()
    {
        return $this->hasMany(Activity::class, 'causer_id', 'id')->latest();
    }

    public function views()
    {
        return $this->belongsToMany(Listing::class, 'real_estate_listing_views', 'lead_id',
            'listing_id')->withoutGlobalScopes()->withPivot(['id', 'count', 'created_at', 'updated_at']);
    }

    public function distances()
    {
        return $this->hasMany(LeadDistance::class, 'lead_id');
    }

    public function calls()
    {
        return $this->hasMany(Call::class,'lead_id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class,'lead_id');
    }
    public function replies()
    {
        return $this->hasMany(Replies::class,'lead_id');
    }
    public function alerts()
    {
        return $this->hasMany(Alert::class,'lead_id');
    }
}
