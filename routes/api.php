<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['as' => 'newuser.'], function () {
    Route::post('login', 'API\UserController@login');
    Route::post('register', 'API\UserController@register');
});


// Auth restricted apis
Route::group(['as' => 'admin.', 'middleware'=>['auth']], function () {
    Route::post('details', 'API\UserController@details');
});


// Public APIs
Route::group(['as' => 'admin.'], function () {
    Route::get('menu/get', 'MenuController@getMenus');
    Route::post('menu/store', 'MenuController@store');
    Route::put('menu/edit/{id}', 'MenuController@update');
    Route::delete('menu/delete/{id}', 'MenuController@delete');
});














