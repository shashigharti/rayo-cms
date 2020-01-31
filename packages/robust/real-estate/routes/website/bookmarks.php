<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.leads.',
    'group' => 'Bookmarks'],
    function () {
       Route::get('/leads/bookmarks/{title}',[
           'name' =>'Lead Bookmarks',
           'as' => 'bookmarks',
           'uses' => 'Robust\RealEstate\Controllers\Website\Leads\BookMarkController@store'
       ]);
        Route::get('/leads/bookmarks/remove/{id}',[
            'name' =>'Lead Bookmarks Delete',
            'as' => 'bookmarks.delete',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\BookMarkController@delete'
        ]);
    });
