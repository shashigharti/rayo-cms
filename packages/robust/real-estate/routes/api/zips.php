<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Zips API'], function () {
    Route::apiResource('zips', '\Robust\RealEstate\Controllers\Api\ZipController');
});
