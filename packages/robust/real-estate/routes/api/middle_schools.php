<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Schools API'], function () {
    Route::resource('middle-schools','\Robust\RealEstate\Controllers\Api\MiddleSchoolController');
});
