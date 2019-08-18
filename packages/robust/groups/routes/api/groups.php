<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Groups'], function () {
    Route::get('groups/all', [
        'as' => 'api.groups.all',
        'uses' => '\Robust\Groups\Controllers\Admin\GroupsApiController@getAll'
    ]);

    Route::post('groups/store', [
        'as' => 'api.groups.store',
        'uses' => '\Robust\Groups\Controllers\Admin\GroupsApiController@store'
    ]);

    Route::put('groups/update/{id}', [
        'as' => 'api.groups.update',
        'uses' => '\Robust\Groups\Controllers\Admin\GroupsApiController@update'
    ]);

    Route::delete('groups/delete/{id}', [
        'as' => 'api.groups.destroy',
        'uses' => '\Robust\Groups\Controllers\Admin\GroupsApiController@destroy'
    ]);
});
