<?php


Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Users'], function () {
    Route::resource('roles', '\Robust\Admin\Controllers\API\RoleController');
});
