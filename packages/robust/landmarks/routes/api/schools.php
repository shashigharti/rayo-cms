<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Schools API'], function () {
    Route::get('schools/all', [
        'as' => 'api.schools.all',
        'uses' => '\Robust\Landmarks\Controllers\Api\SchoolController@getSchoolRegions'
    ]);
});
