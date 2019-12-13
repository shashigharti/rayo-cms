<?php
Route::group([
    'as' => 'website.realestate.',
    'group' => 'Subdivisions'],
    function () {
        Route::get('/subdivisions', [
            'name' =>'Subdivisions',
            'as' => 'subdivisions',
            'uses' => 'Robust\RealEstate\Controllers\Website\SubdivisionController@index'
        ]);
    });
