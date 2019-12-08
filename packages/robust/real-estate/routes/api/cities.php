<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'City API'], function () {
    Route::resource('cities', '\Robust\RealEstate\Controllers\Api\CityController');
    Route::get('/dropdown/cities','\Robust\RealEstate\Controllers\Api\CityController@dropdown');
});
