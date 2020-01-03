<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('is_admin')) {
    /**
     * @param $user
     * @return boolean
     */
    function isAdmin($user)
    {
        return (get_class($user->memberable) == 'Robust\Admin\Models\Admin')? true: false;
    }
}

if (!function_exists('getAvatar')) {
    /**
     * @param $user
     * @return boolean
     */
    function getAvatar($user = null)
    {        
        if($user == null){
            $user = Auth::user();
        }
        $full_name = $user->memberable->first_name . " " .  $user->memberable->last_name;
        return Avatar::create($full_name)->toBase64();
    }
}