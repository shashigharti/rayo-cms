<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.leads.',
    'group' => 'Requests'],
    function () {
       Route::get('/leads/requests/{id}',[
           'name' =>'Lead Requests',
           'as' => 'requests',
           'uses' => 'Robust\RealEstate\Controllers\Website\Leads\RequestController@store'
       ]);
    });
