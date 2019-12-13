<?php
Route::group([
    'as' => 'website.realestate.',
    'group' => 'Amenities'],
    function () {
        Route::get('/amenities', [
            'name' =>'Amenities',
            'as' => 'amenities',
            'uses' => 'Robust\RealEstate\Controllers\Website\AmenityController@index'
        ]);
    });
