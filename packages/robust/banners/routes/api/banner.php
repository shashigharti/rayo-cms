<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.banner.', 'group' => 'Banners'], function () {
    Route::resource('banners','Robust\Banners\Controllers\API\BannerController');
    Route::get('/banner/{slug}', [
        'as' => 'all',
        'uses' => 'Robust\Banners\Controllers\API\BannerController@getAll'
    ]);
});
