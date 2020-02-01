<?php

Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Lead Properties'], function () {
    Route::post('/lead/properties/store/{id}', [
        'name' =>'Leads',
        'as' => 'leads.properties.store',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadPropertiesController@store'
    ]);

    Route::post('/lead/properties/update/{id}', [
        'name' =>'Leads',
        'as' => 'leads.properties.update',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadPropertiesController@update'
    ]);

    Route::post('/lead/properties/price/update/{id}', [
        'name' =>'Leads',
        'as' => 'leads.properties.update.price',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadPropertiesController@updatePrice'
    ]);

    Route::get('/lead/properties/delete/{id}', [
        'name' =>'Leads',
        'as' => 'leads.properties.delete',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadPropertiesController@delete'
    ]);
});
