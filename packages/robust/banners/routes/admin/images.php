<?php

Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.banner.', 'group' => 'Banners'], function () {
    Route::get('banner/{banner}/images', [
    	'name'=>'Images',
        'as' => 'images.get-images',
        'uses' => '\Robust\Banners\Controllers\Admin\BannerController@getBannerImages'
    ]);
    Route::resource('banner/images', '\Robust\Banners\Controllers\Admin\ImageController');
});