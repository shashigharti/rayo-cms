<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'City API'], function () {
    Route::get('city/all', [
        'as' => 'api.cities.all',
        'uses' => '\Robust\Landmarks\Controllers\Admin\CityApiController@getAll'
    ]);
});
