<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Grids API'], function () {
    Route::get('grids/all', [
        'as' => 'api.grids.all',
        'uses' => '\Robust\Landmarks\Controllers\Api\GridController@getAll'
    ]);
});
