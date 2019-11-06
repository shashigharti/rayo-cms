<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Leads'], function () {
    Route::resource('leads', '\Robust\RealEstate\Controllers\Api\LeadsController');

    Route::get('leads/type/{type}', [
        'as' => 'api.leads.getbytype',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@getLeadsByType'
    ]);

    Route::get('leads/agent/{id}', [
        'as' => 'api.leads.getbyagent',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@getLeadsByAgent'
    ]);

    Route::get('lead/{lead}', [
        'as' => 'api.leads.single',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@getLead'
    ]);

    Route::post('lead/store', [
        'as' => 'api.leads.store',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@store'
    ]);

    Route::put('lead/edit/{id}', [
        'as' => 'api.leads.update',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@update'
    ]);

    Route::get('lead-metadata/all', [
        'as' => 'api.leadmetadata.all',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@getAllMetadata'
    ]);

    Route::get('lead-metadata/{id}', [
        'as' => 'api.leadmetadata.single',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@getLeadMetadata'
    ]);

    Route::get('lead-status/all', [
        'as' => 'api.leadstatus.all',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@getAllStatus'
    ]);

    Route::put('lead-status/update/{id}', [
        'as' => 'api.leadstatus.update',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@updateLeadStatus'
    ]);

    Route::post('lead-note/store', [
        'as' => 'api.leadNote.store',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@addNote'
    ])->middleware('auth:api');

    Route::put('lead-note/update', [
        'as' => 'api.leadNote.update',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@updateNote'
    ]);

    Route::post('lead-note/delete', [
        'as' => 'api.leadNote.delete',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@deleteNote'
    ]);

    Route::post('lead-search/store', [
        'as' => 'api.leadSearch.store',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@addLeadSearch'
    ]);

    Route::put('lead-search/update', [
        'as' => 'api.leadSearch.update',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@updateLeadSearch'
    ]);

    Route::delete('lead-search/delete/{id}', [
        'as' => 'api.leadSearch.delete',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@deleteLeadSearch'
    ]);

    Route::delete('lead-category/delete/{id}', [
        'as' => 'api.leadCategory.delete',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@deleteLeadCategory'
    ]);

    Route::put('lead-category/store', [
        'as' => 'api.leadCategory.store',
        'uses' => '\Robust\RealEstate\Controllers\Api\LeadsController@storeLeadCategory'
    ]);
});
