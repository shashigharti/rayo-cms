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

        'first_name',
        'last_name',
        'avatar',
        'contact',
        'address',

    ];

    public function member()
    {
        return $this->morphOne('App\User', 'member');
    }



}
