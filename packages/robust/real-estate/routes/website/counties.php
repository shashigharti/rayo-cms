<?php
Route::group([
    'prefix' => 'real-estate',
    'as' => 'website.realestate.',
    'group' => 'Counties'],
    function () {
        Route::get('/counties', [
            'name' =>'Counties',
            'as' => 'counties',
            'uses' => 'Robust\RealEstate\Controllers\Website\CountyController@index'
        ]);
    });
