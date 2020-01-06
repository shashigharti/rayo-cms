<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Attributes'], function () {
    Route::resources([
		'attributes' => 'Robust\RealEstate\Controllers\Admin\AttributeController'
    ]);
});

