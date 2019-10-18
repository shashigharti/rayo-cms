<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Menus'], function () {
    Route::get('menu/all', [
        'as' => 'api.menus.all',
        'uses' => '\Robust\Menus\Controllers\Api\MenuApiController@getAll'
    ]);

    Route::post('menu/store', [
        'as' => 'api.menus.store',
        'uses' => '\Robust\Menus\Controllers\Api\MenuApiController@store'
    ]);

    Route::put('menu/update/{id}', [
        'as' => 'api.menus.update',
        'uses' => '\Robust\Menus\Controllers\Api\MenuApiController@update'
    ]);

    Route::delete('menu/delete/{id}', [
        'as' => 'api.menus.destroy',
        'uses' => '\Robust\Menus\Controllers\Api\MenuApiController@destroy'
    ]);
});
