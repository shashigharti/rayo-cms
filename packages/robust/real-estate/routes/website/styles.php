<?php
Route::group([
    'as' => 'website.realestate.',
    'group' => 'Styles'],
    function () {
        Route::get('/styles', [
            'name' =>'Styles',
            'as' => 'styles',
            'uses' => 'Robust\RealEstate\Controllers\Website\StyleController@index'
        ]);
    });
