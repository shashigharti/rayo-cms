<?php
Route::group([
    'prefix' => 'api/market',
    'as' => 'api.market.',
    'group' => 'Market Report'],
    function () {

    Route::get('survey/listings', [
        'name' =>'Market Report',
        'as' => 'survey.listings',
        'uses' => '\Robust\RealEstate\Controllers\API\MarketSurveyController@getListings'
    ]);
});