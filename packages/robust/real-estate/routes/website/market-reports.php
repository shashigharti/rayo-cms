<?php
Route::group(['prefix' => 'market',
'as' => 'market.',
'group' => 'Market Report'],
function () {
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
