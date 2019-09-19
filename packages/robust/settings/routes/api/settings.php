<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Settings'], function () {
    Route::get('settings/all', [
        'as' => 'api.settings.all',
        'uses' => '\Robust\Settings\Controllers\Admin\SettingsApiController@getAll'
    ]);

    Route::get('settings/{type}', [
        'as' => 'api.settings.type',
        'uses' => '\Robust\Settings\Controllers\Admin\SettingsApiController@getByType'
    ]);

    Route::put('settings/update/{type}', [
        'as' => 'api.settings.update',
        'uses' => '\Robust\Settings\Controllers\Admin\SettingsApiController@update'
    ]);
});
