<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.leads.',
    'group' => 'Leads'],
    function () {

        Route::post('/leads/profile/update/{id}',[
            'name' => 'Lead Profile Update',
            'as' => 'update',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\LeadController@update'
        ]);

        Route::post('/leads/profile/password/update/{id}',[
            'name' => 'Lead Update password',
            'as' => 'update.password',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\LeadController@changePassword'
        ]);

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
