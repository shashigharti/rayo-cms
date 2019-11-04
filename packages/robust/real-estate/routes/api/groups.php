<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Groups'], function () {
    Route::apiResource('groups', '\Robust\RealEstate\Controllers\Api\GroupsController');
});
