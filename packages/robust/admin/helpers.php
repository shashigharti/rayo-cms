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