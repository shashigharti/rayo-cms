<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Zips API'], function () {
    Route::apiResource('zips', '\Robust\Landmarks\Controllers\Api\ZipController');
});
