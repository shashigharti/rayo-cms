<?php
// TBR - to be removed
$credentials = [
    'email' => 'info@robustitconcepts.com',
    'password' => '12345678'
];
Auth::attempt($credentials);

// TBR - to be removed
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Dashboards'], function () {
    Route::get('/', [
    'as' => 'home',
    'uses' => '\Robust\Core\Controllers\Admin\DashboardController@show'
    ]);
    Route::resource('dashboards', '\Robust\Core\Controllers\Admin\DashboardController');   
});

