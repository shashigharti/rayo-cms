<?php

Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Users'], function () {
    Route::resource('users', '\Robust\Admin\Controllers\Admin\UserController');
});
