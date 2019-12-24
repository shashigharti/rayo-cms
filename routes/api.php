<?php
Route::group(['as' => 'newuser.'], function () {
    Route::post('login', 'API\UserController@login');
    Route::post('register', 'API\UserController@register');
    Route::post('password/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/update', 'Auth\ResetPasswordController@reset');
});


// Auth restricted apis
Route::group(['as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::post('details', 'API\UserController@details');
});

Route::get('/media/{id}','HomeController@getThumbnail');
Route::get('/images','HomeController@getMedia');
Route::post('/media/','HomeController@uploadMedia');