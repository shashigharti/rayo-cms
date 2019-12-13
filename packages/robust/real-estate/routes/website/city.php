<?php
Route::group([
    'as' => 'website.realestate.',
    'group' => 'Cities'],
    function () {
        Route::get('/cities', [
            'name' =>'Cities',
            'as' => 'cities',
            'uses' => 'Robust\RealEstate\Controllers\Website\CityController@index'
        ]);
    });
