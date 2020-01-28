<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Status'], function () {
    Route::resources([
		'status' => 'Robust\RealEstate\Controllers\Admin\StatusController'
    ]);
});

