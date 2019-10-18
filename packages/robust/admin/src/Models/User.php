<?php

namespace Robust\Admin\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Robust\Core\Events\PasswordResetEvent;


/**
 * Class User
 * @package Robust\Admin\Models
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'avatar',
        'first_name',
        'last_name',
        'organization',
        'department',
        'contact',
        'gender',
        'address',
        'region',
        'tole'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return mixed
     */
    public static function getDefaultAgent()
    {
        return User::find(1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles()
    {
        return $this->belongsToMany('Robust\Admin\Models\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dashboards()
    {
        return $this->hasMany('Robust\Core\Models\Dashboard');
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        event(new PasswordResetEvent($this, $token));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts()
    {
        return $this->hasMany('Robust\Cart\Models\AbandonedCart');

    }
}
