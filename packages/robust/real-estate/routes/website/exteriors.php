<?php
Route::group([
    'as' => 'website.realestate.',
    'group' => 'Exteriors'],
    function () {
        Route::get('/exteriors', [
            'name' =>'Exteriors',
            'as' => 'exteriors',
            'uses' => 'Robust\RealEstate\Controllers\Website\ExteriorController@index'
        ]);
    });
