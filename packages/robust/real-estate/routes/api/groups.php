<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Groups API'], function () {
    Route::resource('groups', '\Robust\RealEstate\Controllers\Api\GroupsController');
});
