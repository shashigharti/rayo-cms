<?php
Route::group([
    'as' => 'website.realestate.',
    'group' => 'Counties'],
    function () {
        Route::get('/counties', [
            'name' =>'Counties',
            'as' => 'counties',
            'uses' => 'Robust\RealEstate\Controllers\Website\CountyController@index'
        ]);
    });
