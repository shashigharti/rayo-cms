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
