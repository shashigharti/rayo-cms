<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Agents'], function () {
    Route::get('agents', [
        'as' => 'api.agents',
        'uses' => '\Robust\Leads\Controllers\Api\AgentsController@index'
    ]);
});
