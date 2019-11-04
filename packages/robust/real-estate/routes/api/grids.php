<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Grids API'], function () {
    Route::apiResource('grids','\Robust\RealEstate\Controllers\Api\GridController');
});
