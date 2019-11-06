<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Elementary Schools API'], function () {
    Route::resource('elem-schools','\Robust\RealEstate\Controllers\Api\ElemSchoolController');
});
