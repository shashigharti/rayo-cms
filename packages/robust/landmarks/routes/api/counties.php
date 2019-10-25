<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'County API'], function () {
    Route::apiResource('counties', '\Robust\Landmarks\Controllers\Api\CountyController');
});
