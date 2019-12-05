<?php
Route::group([
    'prefix' => 'real-estate',
    'as' => 'website.realestate.',
    'group' => 'Constructions'],
    function () {
        Route::get('/constructions', [
            'name' =>'Constructions',
            'as' => 'constructions',
            'uses' => 'Robust\RealEstate\Controllers\Website\ConstructionController@index'
        ]);
    });
