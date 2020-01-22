<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Leads'], function () {
    Route::resources([
		'leads' => 'Robust\RealEstate\Controllers\Admin\LeadController'
    ]);
    Route::get('leads/{id}/{type}', [
        'name' =>'Lead Details Page',
        'as' => 'leads.details.edit',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@getDetailsPage'
    ]);

    Route::post('leads/{id}/follow-up', [
        'name' =>'Leads Follow Up',
        'as' => 'leads.follow-up.store',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@addLeadsFollowUp'
    ]);

    Route::post('leads/send/emails', [
        'name' =>'Leads Follow Up',
        'as' => 'leads.send.email',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@sendEmail'
    ]);
});

