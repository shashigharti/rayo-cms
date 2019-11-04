<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'City API'], function () {
    Route::apiResource('cities', '\Robust\Landmarks\Controllers\Api\CityController');
    Route::get('cities/all','\Robust\Landmarks\Controllers\Api\CityController@getActive');
});
