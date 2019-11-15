<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Settings'], function () {
    Route::get('settings', [
        'as' => 'api.settings',
        'uses' => '\Robust\RealEstate\Controllers\Api\SettingsController@index'
    ]);

    Route::get('settings/{type}', [
        'as' => 'api.settings.type',
        'uses' => '\Robust\RealEstate\Controllers\Api\SettingsController@getByType'
    ]);

    Route::get('settings/{type}/search', [
        'as' => 'api.settings.search.type',
        'uses' => '\Robust\RealEstate\Controllers\Api\SettingsController@searchFields'
    ]);

    Route::put('settings/update/{type}', [
        'as' => 'api.settings.update',
        'uses' => '\Robust\RealEstate\Controllers\Api\SettingsController@update'
    ]);
});
