<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Notes'], function () {
    Route::resources([
		'ratings' => 'Robust\RealEstate\Controllers\Admin\LeadRatingsController'
    ]);
});

