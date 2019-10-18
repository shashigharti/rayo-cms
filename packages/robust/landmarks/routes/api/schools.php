<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Schools API'], function () {
    Route::get('elem-schools/all', [
        'as' => 'api.elemSchools.all',
        'uses' => '\Robust\Landmarks\Controllers\Api\SchoolController@getElemSchools'
    ]);

    Route::get('middle-schools/all', [
        'as' => 'api.middleSchools.all',
        'uses' => '\Robust\Landmarks\Controllers\Api\SchoolController@getMiddleSchools'
    ]);

    Route::get('high-schools/all', [
        'as' => 'api.highSchools.all',
        'uses' => '\Robust\Landmarks\Controllers\Api\SchoolController@getHighSchools'
    ]);

    Route::get('schools/all', [
        'as' => 'api.schools.all',
        'uses' => '\Robust\Landmarks\Controllers\Api\SchoolController@getSchoolRegions'
    ]);
});
