<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Pages'], function () {
    Route::get('page/all', [
        'as' => 'api.pages.all',
        'uses' => '\Robust\Pages\Controllers\Admin\PageApiController@getAll'
    ]);

    Route::post('page/store', [
        'as' => 'api.pages.store',
        'uses' => '\Robust\Pages\Controllers\Admin\PageApiController@store'
    ]);

    Route::put('page/edit/{id}', [
        'as' => 'api.pages.update',
        'uses' => '\Robust\Pages\Controllers\Admin\PageApiController@update'
    ]);

    Route::delete('page/delete/{id}', [
        'as' => 'api.pages.destroy',
        'uses' => '\Robust\Pages\Controllers\Admin\PageApiController@destroy'
    ]);
});
