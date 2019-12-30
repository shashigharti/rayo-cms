<?php

Route::group(['prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.leads.email.',
    'group' => 'Emails'],
    function () {

        Route::post('friends/{slug}', [
            'name' => 'Email To friend',
            'as' => 'to-friend',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\EmailController@sendEmailToFriend'
        ]);
        Route::post('agent/{slug', [
            'name' => 'More property info',
            'as' => 'to-agent',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\EmailController@sendEmailtoAgent'
        ]);
    });
