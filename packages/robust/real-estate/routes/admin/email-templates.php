<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Email Templates'], function () {
    Route::resources([
		'email-templates' => 'Robust\RealEstate\Controllers\Admin\EmailTemplateController'
    ]);
});

