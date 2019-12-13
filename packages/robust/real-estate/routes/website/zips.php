<?php
Route::group([
    'as' => 'website.realestate.',
    'group' => 'Zips'],
    function () {
        Route::get('/zips', [
            'name' =>'Zips',
            'as' => 'zips',
            'uses' => 'Robust\RealEstate\Controllers\Website\ZipController@index'
        ]);
    });
