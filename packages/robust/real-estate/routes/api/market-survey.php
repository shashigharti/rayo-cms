<?php
Route::group([
    'prefix' => 'api/market',
    'as' => 'api.market.',
    'group' => 'Market Report'],
    function () {

        Route::get('survey/listings', [
            'name' => 'Market Report',
            'as' => 'survey.listings',
            'uses' => '\Robust\RealEstate\Controllers\API\MarketSurveyController@getListings'
        ]);


        Route::post('survey/listings-by-distance', [
            'name' => 'Market Survey',
            'as' => 'survey.distance',
            'uses' => '\Robust\RealEstate\Controllers\Website\MarketSurveyController@getListingsByDistance'
        ]);
    });
