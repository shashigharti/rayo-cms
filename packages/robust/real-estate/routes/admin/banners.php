<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Banners'], function () {
    Route::resources([
		'banners' => 'Robust\RealEstate\Controllers\Admin\BannerController'
    ]);
});

