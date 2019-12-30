<?php
Route::group(['prefix' => config('core.frw.auth'), 'as' => 'website.auth.','group' => 'Auth'], function () {
    Route::get('login', [
        'name' => 'Login',
        'as' => 'login',
        'uses' => 'Robust\Admin\Controllers\Website\LoginController@login'
    ]);
    Route::get('/register', [
        'as' => 'register',
        'uses' => 'Robust\Admin\Controllers\Website\RegisterController@register'
    ]);
    Route::post('/login', [
        'as' => 'post_login',
        'uses' => 'Robust\Admin\Controllers\Website\LoginController@postLogin'
    ]);
    Route::post('/register', [
        'as' => 'post_register',
        'uses' => 'Robust\Admin\Controllers\Website\RegisterController@postRegister'
    ]);
});