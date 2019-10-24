<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'City API'], function () {
<<<<<<< HEAD
    Route::apiResource('city', '\Robust\Landmarks\Controllers\Admin\CityApiController');
=======
    Route::get('city/all', [
        'as' => 'api.cities.all',
        'uses' => '\Robust\Landmarks\Controllers\Api\CityController@getAll'
    ]);
>>>>>>> feature/mls
});
