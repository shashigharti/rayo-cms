<?php

namespace Robust\Admin\Models;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function member()
    {
        return $this->morphOne('App\User');
    }
}
