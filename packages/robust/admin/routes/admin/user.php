<?php

Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Users'], function () {
    Route::resource('users', '\Robust\Admin\Controllers\Admin\UserController');
});
