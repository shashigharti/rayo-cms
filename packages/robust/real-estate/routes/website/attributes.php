<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.listings.',
    'group' => 'Attributes'],
    function () {

        Route::get('/attributes/{name}', [
            'name' =>'Attributes',
            'as' => 'attributes',
            'uses' => 'Robust\RealEstate\Controllers\Website\AttributeController@index'
        ]);


    });

Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.pages.',
    'group' => 'Pages'],
    function () {
        Route::get('/page/{slug}',[
            'name' =>'Page Details',
            'as' => 'details',
            'uses' => 'Robust\RealEstate\Controllers\Website\PageController@getPage'
        ]);
    });
