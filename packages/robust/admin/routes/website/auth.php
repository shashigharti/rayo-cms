<?php
Route::group(['prefix' => config('core.frw.auth'), 'as' => 'website.auth.','group' => 'Auth'], function () {   
    Route::post('login', [
        'as' => 'login.post',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\LoginController@login'
    ]);   
    Route::get('logout', [
        'as' => 'logout',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\LoginController@logout'
    ]);
    Route::post('register', [
        'as' => 'register.post',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\RegisterController@register'
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

    Route::get('admin-login', [
        'as' => 'admin-login',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\AdminLoginController@login'
    ]);    
    Route::post('admin-login', [
        'as' => 'admin-login.post',
        'uses' => 'Robust\Admin\Controllers\Website\Auth\AdminLoginController@postLogin'
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