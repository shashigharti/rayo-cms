<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Schools API'], function () {
    Route::apiResource('middle-schools','\Robust\RealEstate\Controllers\Api\MiddleSchoolController');
});
