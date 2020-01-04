<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Locations'], function () {
    Route::resources([
		'locations' => 'Robust\RealEstate\Controllers\Admin\LocationController'
    ]);
});

