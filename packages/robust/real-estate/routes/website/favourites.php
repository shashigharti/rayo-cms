<?php
Route::group([
    'prefix' => 'real-estate',
    'as' => 'website.realestate.leads.',
    'group' => 'Favourites'],
    function () {
       Route::get('/leads/favourites/{id}',[
           'name' =>'Lead Favourites',
           'as' => 'favourites',
           'uses' => 'Robust\RealEstate\Controllers\Website\Leads\FavouritesController@store'
       ]);
    });
