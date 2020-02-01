<?php
Route::group([
'prefix' => config('real-estate.frw.website') ."/market",
'as' => 'website.realestate.market.',
'group' => 'Market Report'],
function () {
    Route::get('reports/compare', [
        'name' =>'Market Report Compare',
        'as' => 'reports.compare',
        'uses' => '\Robust\RealEstate\Controllers\Website\MarketReportController@compareLocations'
    ]);
    Route::get('reports/map', [
        'name' =>'Locations Map',
        'as' => 'reports.map',
        'uses' => '\Robust\RealEstate\Controllers\Website\MarketReportController@showInMap'
    ]);
    Route::get('reports/{location_type}', [
        'name' =>'Market Report',
        'as' => 'reports',
        'uses' => '\Robust\RealEstate\Controllers\Website\MarketReportController@index'
    ]);
    Route::get('reports/in/{location_type}/{slug}', [
        'name' =>'Market Report Insight',
        'as' => 'reports.in',
        'uses' => '\Robust\RealEstate\Controllers\Website\MarketReportController@getInsights'
    ]);
});
