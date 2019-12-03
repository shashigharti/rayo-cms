<?php

namespace Robust\RealEstate\Models;


use Robust\Admin\UI\User;
use Robust\Core\Models\BaseModel;


/**
 * Class UserLoginHistory
 * @package Robust\Leads\Models
 */
class UserLoginHistory extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_user_login_history';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'type_of_event', 'time_of_login',
    ];

}
