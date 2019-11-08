<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Agents'], function () {
    Route::resource('leads/agents', '\Robust\RealEstate\Controllers\Api\AgentsController');
});
