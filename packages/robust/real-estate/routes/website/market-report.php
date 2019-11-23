<?php
Route::group(['prefix' => 'market', 
'as' => 'realestate.market.', 
'group' => 'Market Report'], 
function () {


    Route::get('reports/{type}', [
        'name' =>'Market Report',
        'as' => 'reports',
        'uses' => '\Robust\RealEstate\Controllers\Website\MarketReportController@index'
    ]);



});
