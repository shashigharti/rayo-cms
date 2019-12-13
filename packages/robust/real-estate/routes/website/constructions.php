<?php
Route::group([
    'as' => 'website.realestate.',
    'group' => 'Constructions'],
    function () {
        Route::get('/constructions', [
            'name' =>'Constructions',
            'as' => 'constructions',
            'uses' => 'Robust\RealEstate\Controllers\Website\ConstructionController@index'
        ]);
    });
