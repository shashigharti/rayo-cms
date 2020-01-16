<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Leads'], function () {
    Route::resources([
		'leads' => 'Robust\RealEstate\Controllers\Admin\LeadController'
    ]);
    Route::get('leads/{id}/{type}', [
        'name' =>'Lead Details Page',
        'as' => 'leads.details',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@getDetailsPage'
    ]);
});

