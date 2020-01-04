<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Leads'], function () {
    Route::resources([
		'leads' => 'Robust\RealEstate\Controllers\Admin\LeadController'
    ]);
});

