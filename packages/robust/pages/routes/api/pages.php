<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Pages'], function () {
    Route::apiResource('pages','\Robust\Pages\Controllers\Api\PageController');
});
