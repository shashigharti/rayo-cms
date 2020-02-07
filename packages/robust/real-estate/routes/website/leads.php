<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.leads.',
    'group' => 'Leads'],
    function () {
        Route::get('/leads/searches', [
            'name' => 'Lead Searches',
            'as' => 'search.store',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\LeadController@storeSearch'
        ]);

        Route::post('/leads/email/friend/{slug}', [
            'name' => 'Lead Friend Email',
            'as' => 'email.friend',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\EmailController@sendEmailToFriend'
        ]);

        Route::post('/leads/email/agent/{slug}', [
            'name' => 'Lead Agent Email',
            'as' => 'email.agent',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\EmailController@sendEmailtoAgent'
        ]);

        Route::post('/leads/distance/{listing_id}', [
            'name' => 'Lead Distance Store',
            'as' => 'distance.store',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\LeadController@storeDistance'
        ]);
    });
