<?php
Route::group(['prefix' => 'profile',
    'as' => 'website.realestate.profile.',
    'group' => 'Market Report'],
    function () {


        Route::get('/', [
            'name' =>'Lead Profile',
            'as' => 'index',
            'uses' => '\Robust\RealEstate\Controllers\Website\ProfileController@index'
        ]);

        Route::post('/update', [
            'name' =>'Lead Profile Update',
            'as' => 'update',
            'uses' => '\Robust\RealEstate\Controllers\Website\ProfileController@update'
        ]);
    });
