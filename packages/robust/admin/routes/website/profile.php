<?php
Route::group(['prefix' => config('core.frw.user'), 'as' => 'website.user.', 'group' => 'User Profile'], function () {
    Route::get('/', [ // appends user
    'as' => 'profile',
    'uses' => '\Robust\Core\Controllers\Website\ProfileController@index'
    ]);
});

