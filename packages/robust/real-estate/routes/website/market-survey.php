<?php
Route::group(['prefix' => config('real-estate.frw.website') ."/market",
'as' => 'website.realestate.market.',
'group' => 'Market Survey'],
function () {
    Route::get('survey', [
        'name' =>'Market Survey',
        'as' => 'survey',
        'uses' => '\Robust\RealEstate\Controllers\Website\MarketSurveyController@index'
    ]);
});

