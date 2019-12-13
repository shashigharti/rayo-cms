<?php
Route::group([
    'as' => 'website.realestate.',
    'group' => 'Attributes'],
    function () {
        Route::get('/attributes/{name}', [
            'name' =>'Attributes',
            'as' => 'attributes',
            'uses' => 'Robust\RealEstate\Controllers\Website\AttributeController@index'
        ]);
    });
