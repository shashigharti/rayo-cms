<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Groups'], function () {
    Route::resources([
		'groups' => 'Robust\RealEstate\Controllers\Admin\GroupController'
    ]);
});

