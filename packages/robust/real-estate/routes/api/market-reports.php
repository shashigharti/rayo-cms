<?php
Route::group([
    'prefix' => 'api/market',
    'as' => 'api.market.',
    'group' => 'Market Report'],
    function () {

    Route::get('reports/{location_type}', [
        'name' =>'Market Report',
        'as' => 'reports',
        'uses' => '\Robust\RealEstate\Controllers\API\MarketReportController@getReports'
    ]);
    Route::get('reports/in/{location_type}/{slug}', [
        'name' =>'Market Report Insight',
        'as' => 'reports.in.subdivisions',
        'uses' => '\Robust\RealEstate\Controllers\API\MarketReportController@getSubdivisions'
    ]);

});
