<?php
Route::group(['prefix' => config('core.frw.auth'), 'as' => 'website.auth.','group' => 'Auth'], function () {
    Route::get('login', [
        'as' => 'login',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\LoginController@login'
    ]);
    Route::post('login', [
        'as' => 'login.post',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\LoginController@postLogin'
    ]);
    Route::get('logout', [
        'name' => 'Logout',
        'as' => 'logout',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\LoginController@logout'
    ]);
    
    Route::get('register', [
        'as' => 'register',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\RegisterController@register'
    ]);
    
    Route::post('register', [
        'as' => 'register.post',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\RegisterController@postRegister'
    ]);



    Route::get('password/reset', [
        'as' => 'password.request',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\ForgotPasswordController@showLinkRequestForm'
    ]);
    
    Route::post('password/email', [
        'as' => 'password.email',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\ForgotPasswordController@sendResetLinkEmail'
    ]);

    Route::get('password/reset/{token}', [
        'as' => 'password.reset',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\ForgotPasswordController@showResetForm'
    ]);
    
    Route::post('password/reset', [
        'as' => 'password.update',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\ResetPasswordController@reset'
    ]);

});

Route::group(['prefix' => '', 'as' => 'website.auth.verification.','group' => 'Verification'], function () {
    Route::get('/email/verify', [
        'name' => 'verification notice',
        'as' => 'notice',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\VerificationController@show'
    ]);
    Route::get('/email/verify/{id}', [
        'name' => 'verify',
        'as' => 'verify',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\VerificationController@verify'
    ]);
    Route::get('/email/resend', [
        'name' => 'resend',
        'as' => 'resend',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\VerificationController@resend'
    ]);
});

