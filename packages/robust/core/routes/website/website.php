<?php
Route::get('/', [
    'as' => 'home',
    'uses' => '\Robust\Core\Controllers\Website\HomeController@index'
]);

