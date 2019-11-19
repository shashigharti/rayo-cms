<?php

Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Menus'], function () {
    Route::get('/menus/type/{type}/','\Robust\Menus\Controllers\Api\CoreMenuController@getMenusByPackage');
});
