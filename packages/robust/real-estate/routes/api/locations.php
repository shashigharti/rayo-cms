<?php

Route::group(['prefix' => config('core.frw.api'),
'as' => 'api.locations.',
'group' => 'Locations'],
function () {
    Route::get('locations', [
        'name' =>'Locations',
        'as' => 'index',
        'uses' => '\Robust\RealEstate\Controllers\API\LocationController@index'
    ]);
    Route::get('locations/{type}', [
        'name' =>'Locations By Type',
        'as' => 'type',
        'uses' => '\Robust\RealEstate\Controllers\API\LocationController@getLocationByType'
    ]);

});
