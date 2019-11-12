<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Menus'], function () {
    Route::resource('menus', '\Robust\Menus\Controllers\Api\MenuController');
});
