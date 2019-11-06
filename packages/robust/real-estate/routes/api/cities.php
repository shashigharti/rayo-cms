<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'City API'], function () {
    Route::resource('cities', '\Robust\RealEstate\Controllers\Api\CityController');
    Route::get('cities/all','\Robust\RealEstate\Controllers\Api\CityController@getActive');
});
