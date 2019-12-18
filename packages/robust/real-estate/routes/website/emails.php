<?php

Route::group(['prefix' => 'emails',
    'as' => 'website.realestate.email.',
    'group' => 'Emails'],
    function () {

        Route::post('friends/{slug}', [
            'name' => 'Email To friend',
            'as' => 'friend',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\EmailController@sendEmailToFriend'
        ]);
        Route::post('agent/{slug', [
            'name' => 'More property info',
            'as' => 'agent',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\EmailController@sendEmailtoAgent'
        ]);
    });
