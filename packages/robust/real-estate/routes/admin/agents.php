<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Agents'], function () {
    Route::resources([
		'agents' => 'Robust\RealEstate\Controllers\Admin\AgentController'
    ]);
});

