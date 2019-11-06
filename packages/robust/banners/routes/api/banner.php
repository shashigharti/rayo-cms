<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.banner.', 'group' => 'Banners'], function () {

    Route::get('/banner/{slug}', [
        'as' => 'all',
        'uses' => 'Robust\Banners\Controllers\API\BannerController@getAll'
    ]);
});