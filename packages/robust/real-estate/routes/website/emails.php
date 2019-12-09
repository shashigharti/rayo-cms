<?php

Route::group(['prefix' => 'emails',
    'as' => 'website.realestate.email.',
    'group' => 'Emails'],
    function () {

        Route::post('friends/{id}', [
            'name' => 'Email To friend',
            'as' => 'friend',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\EmailController@sendEmailToFriend'
        ]);
        Route::post('agent/{id}', [
            'name' => 'More property info',
            'as' => 'agent',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\EmailController@sendEmailtoAgent'
        ]);
    });
