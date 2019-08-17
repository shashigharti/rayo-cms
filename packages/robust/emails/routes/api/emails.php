<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Emails'], function () {
    Route::get('email-template/all', [
        'as' => 'api.emails.all',
        'uses' => '\Robust\Emails\Controllers\Admin\EmailApiController@getAll'
    ]);

    Route::post('email-template/store', [
        'as' => 'api.emails.store',
        'uses' => '\Robust\Emails\Controllers\Admin\EmailApiController@store'
    ]);

    Route::put('email-template/update/{id}', [
        'as' => 'api.emails.update',
        'uses' => '\Robust\Emails\Controllers\Admin\EmailApiController@update'
    ]);

    Route::delete('email-template/delete/{id}', [
        'as' => 'api.emails.destroy',
        'uses' => '\Robust\Emails\Controllers\Admin\EmailApiController@destroy'
    ]);
});
