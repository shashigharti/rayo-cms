<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Settings'], function () {
    Route::get('settings/all', [
        'as' => 'api.settings.all',
        'uses' => '\Robust\Settings\Controllers\Admin\SettingsApiController@getAll'
    ]);

    Route::put('settings/update/{type}', [
        'as' => 'api.settings.update',
        'uses' => '\Robust\Settings\Controllers\Admin\SettingsApiController@update'
    ]);
});
