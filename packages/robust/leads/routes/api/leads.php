<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Leads'], function () {
    Route::get('leads/all', [
        'as' => 'api.leads.all',
        'uses' => '\Robust\Leads\Controllers\Admin\LeadsApiController@getAll'
    ]);

    Route::get('lead/{id}', [
        'as' => 'api.leads.single',
        'uses' => '\Robust\Leads\Controllers\Admin\LeadsApiController@getLead'
    ]);

    Route::post('lead/store', [
        'as' => 'api.leads.store',
        'uses' => '\Robust\Leads\Controllers\Admin\LeadsApiController@store'
    ]);

    Route::put('lead/edit/{id}', [
        'as' => 'api.leads.update',
        'uses' => '\Robust\Leads\Controllers\Admin\LeadsApiController@update'
    ]);

    Route::get('lead-metadata/all', [
        'as' => 'api.leadmetadata.all',
        'uses' => '\Robust\Leads\Controllers\Admin\LeadsApiController@getAllMetadata'
    ]);

    Route::get('lead-metadata/{id}', [
        'as' => 'api.leadmetadata.single',
        'uses' => '\Robust\Leads\Controllers\Admin\LeadsApiController@getLeadMetadata'
    ]);
});
