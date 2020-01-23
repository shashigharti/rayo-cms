<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Notes'], function () {
    Route::resources([
		'notes' => 'Robust\RealEstate\Controllers\Admin\LeadNotesController'
    ]);
});

