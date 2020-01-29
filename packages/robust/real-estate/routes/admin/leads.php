<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Leads'], function () {
    Route::resources([
		'leads' => 'Robust\RealEstate\Controllers\Admin\LeadController'
    ]);

    Route::get('leads/review/{id}', [
        'name' =>'Lead Review Page',
        'as' => 'leads.review',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@review'
    ]);
    //temp
    Route::post('update/leads/{id}',[
        'name' =>'Lead Details Page',
        'as' => 'update.leads',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@update'
    ]);
    Route::get('leads/{id}/{type}', [
        'name' =>'Lead Details Page',
        'as' => 'leads.details.edit',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@getDetailsPage'
    ]);

    Route::post('leads/{id}/follow-up', [
        'name' =>'Leads Follow Up',
        'as' => 'leads.follow-up.store',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@addFollowup'
    ]);

    Route::post('leads/follow-up/{id}/update', [
        'name' =>'Leads Follow Up',
        'as' => 'leads.follow-up.update',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@updateFollowup'
    ]);

    Route::post('leads/send/emails/{id}', [
        'name' =>'Leads Send Email',
        'as' => 'leads.send.email',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@sendEmail'
    ]);

    Route::post('leads/update/groups/{id}', [
        'name' =>'Leads Update Group',
        'as' => 'leads.update.groups',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@updateGroup'
    ]);

    Route::get('leads/delete/groups/{id}/{group?}', [
        'name' =>'Leads Delete Group',
        'as' => 'leads.delete.groups',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@deleteGroup'
    ]);

    Route::post('leads/modals', [
        'name' =>'Leads Delete Group',
        'as' => 'leads.modal',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadController@getModal'
    ]);
});

