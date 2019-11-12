<?php


// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::get('/listings',[
   'as' => 'website.listings.index',
   'uses' => 'ListingController@index'
]);

Route::get('/listings/detail',[
    'as' => 'website.listings.detail',
    'uses' => 'ListingController@detail'
]);


Route::get('/profile',[
    'as' => 'website.profile.index',
    'uses' => 'HomeController@profile'
]);

Route::get('/market-survey',[
    'as' => 'website.market-survey.index',
    'uses' => 'HomeController@marketSurvey'
]);
Route::get('/market-report',[
    'as' => 'website.market-report.index',
    'uses' => 'HomeController@marketReport'
]);

Route::get('/login',[
   'as' =>'login',
   'uses' => '\Robust\Core\Controllers\Auth\LoginController@getLogin'
]);
