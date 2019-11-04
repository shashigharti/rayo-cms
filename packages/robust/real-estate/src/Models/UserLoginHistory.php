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
    protected $table = 'user_login_history';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'type_of_event', 'time_of_login',
    ];

    /**
     * @param $user_id
     */
    public static function lastLogin($user_id){
//        \App\UserLoginHistory::create([
//            'user_id' => $user_id,
//            'type_of_event' => 'login',
//            'time_of_login' => new Carbon(),
//        ]);
//        event(new CountUpdate($user_id, 'logins_count'));
    }
}
