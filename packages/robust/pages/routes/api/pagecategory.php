<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'API Page Categories'], function () {
    Route::get('page-category/all', [
        'as' => 'api.page-category.all',
        'uses' => '\Robust\Pages\Controllers\Api\PageCategoryApiController@getAll'
    ]);

    Route::post('page-category/store', [
        'as' => 'api.page-category.store',
        'uses' => '\Robust\Pages\Controllers\Api\PageCategoryApiController@store'
    ]);

    Route::put('page-category/edit/{id}', [
        'as' => 'api.page-category.update',
        'uses' => '\Robust\Pages\Controllers\Api\PageCategoryApiController@update'
    ]);

    Route::delete('page-category/delete/{id}', [
        'as' => 'api.page-category.destroy',
        'uses' => '\Robust\Pages\Controllers\Api\PageCategoryApiController@destroy'
    ]);
});
