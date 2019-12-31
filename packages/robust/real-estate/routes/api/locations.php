<?php

Route::group(['prefix' => config('core.frw.api'), 
'as' => 'api.', 
'group' => 'Locations'], 
function () {
    Route::get('locations', [
        'name' =>'Locations',
        'as' => 'locations',
        'uses' => '\Robust\RealEstate\Controllers\API\LocationController@index'
    ]);
    Route::get('locations/{type}', [
        'name' =>'Locations By Type',
        'as' => 'locations.type',
        'uses' => '\Robust\RealEstate\Controllers\API\LocationController@getLocationByType'
    ]);

});
