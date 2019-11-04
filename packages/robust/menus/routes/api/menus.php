<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Menus'], function () {
    Route::apiResource('menus', '\Robust\Menus\Controllers\Api\MenuController');
});
