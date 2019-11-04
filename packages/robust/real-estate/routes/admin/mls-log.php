<?php
Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Mls Users'], function () {
    Route::resource('mlslog', '\Robust\RealEstate\Controllers\Admin\MlsLogController');
});

