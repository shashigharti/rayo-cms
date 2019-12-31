<?php
Route::get('/admin', [
    'as' => 'admin.home',
    'uses' => '\Robust\Core\Controllers\Admin\DashboardController@show'
])->middleware('admin');
Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Dashboards'], function () {
    Route::resource('dashboards', '\Robust\Core\Controllers\Admin\DashboardController');   
});

