<?php

Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Banners'], function () {
    Route::resource('banners', '\Robust\Banners\Controllers\Admin\BannerController');
});