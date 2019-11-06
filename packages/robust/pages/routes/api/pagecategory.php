<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Page Categories'], function () {
    Route::resource('pages/categories','\Robust\Pages\Controllers\Api\PageCategoryController');
});
