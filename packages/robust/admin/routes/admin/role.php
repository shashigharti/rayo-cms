<?php

Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Roles'], function () {
    Route::resource('roles',  '\Robust\Admin\Controllers\Admin\RoleController');
});