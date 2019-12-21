<?php
Route::group([
    'prefix' => 'api/market',
    'as' => 'api.realestate.market.',
    'group' => 'Market Report'],
    function () {

    Route::get('reports/{location_type}', [
        'name' =>'Market Report',
        'as' => 'reports',
        'uses' => '\Robust\RealEstate\Controllers\API\MarketReportController@getReports'
    ]);

});
