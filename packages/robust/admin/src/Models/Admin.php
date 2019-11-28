<?php

namespace Robust\Admin\Models;


use Illuminate\Notifications\Notifiable;
use Robust\Core\Models\BaseModel;


/**
 * Class User
 * @package Robust\Admin\Models
 */
class Admin extends BaseModel
{

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



}
