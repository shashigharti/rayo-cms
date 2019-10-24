<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Zips API'], function () {
    Route::get('zips/all', [
        'as' => 'api.zips.all',
        'uses' => '\Robust\Landmarks\Controllers\Api\ZipController@getAll'
    ]);
});
