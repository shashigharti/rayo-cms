<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'County API'], function () {
    Route::resource('counties', '\Robust\RealEstate\Controllers\Api\CountyController');
    Route::get('/dropdown/counties','\Robust\RealEstate\Controllers\Api\CountyController@dropdown');
});
