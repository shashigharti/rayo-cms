<?php

// Override core home page by real-estate home page
Route::get('/', [
    'as' => 'website.home',
    'uses' => '\App\Http\Controllers\HomeController@index'
]);
