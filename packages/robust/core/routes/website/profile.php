<?php
Route::group(['prefix' => config('core.frw.user'), 'as' => 'website.', 'group' => 'User Profile'], function () {
    Route::get('/', [
    'as' => 'profile',
    'uses' => '\Robust\Core\Controllers\Website\ProfileController@index'
    ]);
});

