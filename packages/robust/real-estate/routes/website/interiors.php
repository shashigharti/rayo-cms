<?php
Route::group([
    'prefix' => 'real-estate',
    'as' => 'website.realestate.',
    'group' => 'Interiors'],
    function () {
        Route::get('/interiors', [
            'name' =>'Interiors',
            'as' => 'interiors',
            'uses' => 'Robust\RealEstate\Controllers\Website\InteriorController@index'
        ]);
    });
