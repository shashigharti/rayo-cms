<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Direct any routes to index page and leave the handling to react.
Route::get('/', function() {
    return view('home');
});

Route::get('/{path}',[
    'as' => 'dashboard',
    'uses' => 'HomeController@index'
]);
