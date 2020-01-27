<?php

namespace Robust\Admin\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class UserActivity
 * @package Robust\Admin\Models
 */
class UserActivity extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
       'title','slug','user_id','url','description'
    ];
}
