<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.auth.','group' => 'Auth'], function () {
    Route::get('login', [
        'as' => 'login',
        'uses' => 'Robust\Admin\Controllers\Admin\Auth\LoginController@login'
    ]);    
    Route::post('login', [
        'as' => 'login.post',
        'uses' => 'Robust\Admin\Controllers\Admin\Auth\LoginController@postLogin'
    ]);
    Route::get('logout', [
        'as' => 'logout',
        'uses' => 'Robust\Admin\Controllers\Admin\Auth\LoginController@logout'
    ]);
});