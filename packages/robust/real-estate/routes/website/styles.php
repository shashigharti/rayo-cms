<?php
Route::group([
    'prefix' => 'real-estate',
    'as' => 'website.realestate.',
    'group' => 'Styles'],
    function () {
        Route::get('/styles', [
            'name' =>'Styles',
            'as' => 'styles',
            'uses' => 'Robust\RealEstate\Controllers\Website\StyleController@index'
        ]);
    });
