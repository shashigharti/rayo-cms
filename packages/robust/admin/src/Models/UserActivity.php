<?php

namespace Robust\Admin\Models;

use Robust\Core\Models\BaseModel;
use Robust\RealEstate\Models\Lead;


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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
