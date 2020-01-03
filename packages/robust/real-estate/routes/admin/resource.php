<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Back Up'], function () {
    Route::resources([
		'leads' => 'Robust\Core\Controllers\Admin\LeadController',
		'agents' => 'Robust\Core\Controllers\Admin\AgentController',
		'locations' => 'Robust\Core\Controllers\Admin\LocationController',
		'groups' => 'Robust\Core\Controllers\Admin\GroupController',
		'email-templates' => 'Robust\Core\Controllers\Admin\EmailTemplateController'
    ]);
});

