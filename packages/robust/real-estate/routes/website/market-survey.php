<?php
Route::group(['prefix' => config('real-estate.frw.website') ."/market",
'as' => 'website.realestate.market.',
'group' => 'Market Survey'],
function () {
    Route::post('survey/{location_type}/{location}', [
        'name' =>'Market Survey',
        'as' => 'survey',
        'uses' => '\Robust\RealEstate\Controllers\Website\MarketSurveyController@index'
    ]);
});

