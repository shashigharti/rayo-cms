<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.leads.profile.',
    'group' => 'Lead Profile'],
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
