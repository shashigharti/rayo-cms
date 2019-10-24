<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'City API'], function () {
    Route::apiResource('city', '\Robust\Landmarks\Controllers\Admin\CityApiController');
});
