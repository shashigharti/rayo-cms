<?php
Route::get('/user-login', [
        'name' => 'Login - Register',
        'as' => 'user.login',
        'uses' => 'Robust\Admin\Controllers\Website\LoginController@getLogin'
    ]);

    Route::post('/register', [
        'as' => 'user.register',
        'uses' => 'Robust\Admin\Controllers\Website\RegisterController@postRegister'
    ]);

    Route::post('/login', [
        'as' => 'user.login_post',
        'uses' => 'Robust\Admin\Controllers\Website\LoginController@postLogin'
    ]);