<?php
Route::group(['prefix' => config('core.frw.profile'), 'as' => 'website.user.', 'group' => 'User Profile'], function () {
    Route::get('/', [ // appends profile
    'as' => 'profile',
    'uses' => '\Robust\Core\Controllers\Website\ProfileController@index'
    ]);
});

