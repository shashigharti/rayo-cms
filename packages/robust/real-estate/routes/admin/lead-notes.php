<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Notes'], function () {
    Route::resources([
		'notes' => 'Robust\RealEstate\Controllers\Admin\LeadNotesController'
    ]);

    Route::post('leads/notes/{id}/update', [
        'name' =>'Leads Notes',
        'as' => 'leads.notes.update',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadNotesController@updateNotes'
    ]);
});

