<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Zips API'], function () {
    Route::resource('zips', '\Robust\RealEstate\Controllers\Api\ZipController');
    Route::get('/dropdown/zips','\Robust\RealEstate\Controllers\Api\ZipController@dropdown');
});
