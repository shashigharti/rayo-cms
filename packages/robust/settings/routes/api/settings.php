<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Settings'], function () {
    Route::get('settings', [
        'as' => 'api.settings',
        'uses' => '\Robust\Settings\Controllers\Api\SettingsController@index'
    ]);

    Route::get('settings/{type}', [
        'as' => 'api.settings.type',
        'uses' => '\Robust\Settings\Controllers\Api\SettingsController@getByType'
    ]);

    Route::put('settings/update/{type}', [
        'as' => 'api.settings.update',
        'uses' => '\Robust\Settings\Controllers\Api\SettingsController@update'
    ]);
});
