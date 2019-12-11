<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Settings'], function () {
    Route::get('settings', [
        'as' => 'api.settings',
        'uses' => '\Robust\Core\Controllers\Api\SettingController@index'
    ]);

    Route::get('settings/{slug}', [
        'as' => 'api.settings.type',
        'uses' => '\Robust\Core\Controllers\Api\SettingController@getByType'
    ]);

    Route::get('settings/{slug}/search', [
        'as' => 'api.settings.search.type',
        'uses' => '\Robust\Core\Controllers\Api\SettingController@searchFields'
    ]);

    Route::put('settings/update/{slug}', [
        'as' => 'api.settings.update',
        'uses' => '\Robust\Core\Controllers\Api\SettingController@update'
    ]);
});
