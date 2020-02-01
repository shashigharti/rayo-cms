<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.leads.',
    'group' => 'Leads'],
    function () {
        Route::get('/leads/searches/{lead-id}', [
            'name' => 'Lead Searches',
            'as' => 'search.store',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\LeadController@storeSearch'
        ]);
    });
