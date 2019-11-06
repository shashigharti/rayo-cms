<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Schools API'], function () {
    Route::resource('high-schools','\Robust\RealEstate\Controllers\Api\HighSchoolController');
});
