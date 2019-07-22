<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');

Route::post('register', 'API\UserController@register');

// Auth restricted apis
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\UserController@details');
});

// Get All Profile Reports
Route::get('/{local_government_id}/profile',[
    'as' => 'profile-reports.getReport',
    'uses' => 'ProfileReportsController@getProfileReport'
]);

Route::get('/map-details/{type}/{local_government}',[
    'as' => 'map.getDetails',
    'uses' => 'SurveyController@getDetails'
]);

Route::get('/family-config',[
    'as' => 'family-details.getFamilyDetailsConfig',
    'uses' => 'SurveyController@getFamilyDetailsConfig'
]);

// Metrics API
Route::prefix('metrics')->group(function() {
    Route::get('surveyors',[
        'as' => 'metrics.total-surveys',
        'uses' => 'SurveyController@totalSurveyors'
    ]);

    Route::get('total-users',[
        'as' => 'metrics.total-users',
        'uses' => 'SurveyController@getTotalUsers'
    ]);

    Route::get('weekly-active-users',[
        'as' => 'metrics.weekly-active-users',
        'uses' => 'SurveyController@getWeeklyActiveUsers'
    ]);

    Route::get('weekly-submissions',[
        'as' => 'metrics.weekly-submissions',
        'uses' => 'SurveyController@getDailyWeeklySubmissions'
    ]);

    Route::get('total-population',[
        'as' => 'metrics.total-population',
        'uses' => 'SurveyController@getTotalPopulation'
    ]);

    Route::get('household-count',[
        'as' => 'metrics.household-count',
        'uses' => 'SurveyController@getHouseholdCount'
    ]);

    Route::get('male-female',[
        'as' => 'metrics.male-female-count',
        'uses' => 'SurveyController@getTotalMaleFemale'
    ]);
});

Route::get('/local-governments',[
    'as' => 'profile.local-governments',
    'uses' => 'ProfileReportsController@getAllLocalGovernments'
]);





