<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Call
 * @package Robust\RealEstate\Models
 */
class Agent extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_agents';


    /**
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','avatar','contact','address','last_active_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function member()
    {
        return $this->morphOne('App\User', 'member');
    }
}
