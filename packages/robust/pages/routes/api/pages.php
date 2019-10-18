<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Pages'], function () {
    Route::get('page/all', [
        'as' => 'api.pages.all',
        'uses' => '\Robust\Pages\Controllers\Api\PageApiController@getAll'
    ]);

    Route::post('page/store', [
        'as' => 'api.pages.store',
        'uses' => '\Robust\Pages\Controllers\Api\PageApiController@store'
    ]);

    Route::get('page/edit/{id}', [
        'as' => 'api.pages.edit',
        'uses' => '\Robust\Pages\Controllers\Api\PageApiController@edit'
    ]);

    Route::put('page/update/{id}', [
        'as' => 'api.pages.edit',
        'uses' => '\Robust\Pages\Controllers\Api\PageApiController@update'
    ]);

    Route::delete('page/delete/{id}', [
        'as' => 'api.pages.destroy',
        'uses' => '\Robust\Pages\Controllers\Api\PageApiController@destroy'
    ]);
});
