<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Pages'], function () {
    Route::get('page/all', [
        'as' => 'api.pages.all',
        'uses' => '\Robust\Pages\Controllers\Api\PageController@getAll'
    ]);

    Route::post('page/store', [
        'as' => 'api.pages.store',
        'uses' => '\Robust\Pages\Controllers\Api\PageController@store'
    ]);

    Route::get('page/edit/{id}', [
        'as' => 'api.pages.edit',
        'uses' => '\Robust\Pages\Controllers\Api\PageController@edit'
    ]);

    Route::put('page/update/{id}', [
        'as' => 'api.pages.edit',
        'uses' => '\Robust\Pages\Controllers\Api\PageController@update'
    ]);

    Route::delete('page/delete/{id}', [
        'as' => 'api.pages.destroy',
        'uses' => '\Robust\Pages\Controllers\Api\PageController@destroy'
    ]);
});
