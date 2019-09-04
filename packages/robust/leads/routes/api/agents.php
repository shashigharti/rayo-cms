<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Agents'], function () {
    Route::get('agents/all', [
        'as' => 'api.agents.all',
        'uses' => '\Robust\Leads\Controllers\Admin\AgentsApiController@getAll'
    ]);
});
