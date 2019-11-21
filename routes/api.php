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
Route::get('/images/all','HomeController@getMedia');
Route::post('/upload','HomeController@uploadMedia');
Route::get('/user/all','API\UserController@index');
Route::get('/user/edit/{id}','API\UserController@edit');
Route::put('/user/update/{id}','API\UserController@update');
Route::post('/user/store/','API\UserController@store');
Route::apiResource('/role','\Robust\Admin\Controllers\API\RoleController');
Route::apiResource('/permission','\Robust\Admin\Controllers\API\PermissionController');
