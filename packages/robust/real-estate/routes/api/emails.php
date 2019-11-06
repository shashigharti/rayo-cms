<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Emails'], function () {
    Route::get('email-template/all', [
        'as' => 'api.emails.all',
        'uses' => '\Robust\RealEstate\Controllers\Api\EmailController@getAll'
    ]);

    Route::post('email-template/store', [
        'as' => 'api.emails.store',
        'uses' => '\Robust\RealEstate\Controllers\Api\EmailController@store'
    ]);

    Route::put('email-template/update/{id}', [
        'as' => 'api.emails.update',
        'uses' => '\Robust\RealEstate\Controllers\Api\EmailController@update'
    ]);

    Route::delete('email-template/delete/{id}', [
        'as' => 'api.emails.destroy',
        'uses' => '\Robust\RealEstate\Controllers\Api\EmailController@destroy'
    ]);
});
