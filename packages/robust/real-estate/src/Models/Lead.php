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
        return $this->hasMany(LeadBookMark::class);
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
        return $this->belongsTo(LeadCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function email()
    {
        return $this->hasMany(SentEmails::class, 'lead_id', 'id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany(SentEmails::class, 'lead_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function note()
    {
        return $this->hasMany(LeadNote::class, 'lead_id', 'id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany(LeadNote::class, 'lead_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activityLog()
    {
        return $this->hasMany(Activity::class, 'causer_id', 'id')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function views()
    {
        return $this->belongsToMany(Listing::class, 'real_estate_listing_views', 'lead_id',
            'listing_id')->withoutGlobalScopes()->withPivot(['id', 'count', 'created_at', 'updated_at']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function distances()
    {
        return $this->hasMany(LeadDistance::class, 'lead_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calls()
    {
        return $this->hasMany(LeadCall::class,'lead_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rating()
    {
        return $this->hasOne(LeadRating::class,'lead_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(LeadEmailReply::class,'lead_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alerts()
    {
        return $this->hasMany(Alert::class,'lead_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }
}
