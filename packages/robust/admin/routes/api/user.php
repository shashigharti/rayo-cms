<?php


Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Users'], function () {
    Route::resource('users', '\Robust\Admin\Controllers\API\UserController');
    Route::resource('admins', '\Robust\Admin\Controllers\API\AdminController');
    Route::get('agents','\Robust\Admin\Controllers\API\UserController@getAgents');
    Route::get('users/{id}/permissions','\Robust\Admin\Controllers\API\UserController@getUserPermissions');
    Route::get('users/{id}/roles','\Robust\Admin\Controllers\API\UserController@getUserRoles');
});
