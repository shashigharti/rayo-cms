<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Schools API'], function () {
    Route::apiResource('elem-schools','\Robust\Landmarks\Controllers\Api\ElemSchoolController');
});
