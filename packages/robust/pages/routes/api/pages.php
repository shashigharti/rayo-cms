<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Pages'], function () {
    Route::resource('pages','\Robust\Pages\Controllers\Api\PageController');
});
