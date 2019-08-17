<?php

Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Categories'], function () {
    Route::resource('pagecategories', '\Robust\Pages\Controllers\Admin\CategoryController');

    Route::get('/category/{id}/pages', [
        'as' => 'pagecategories.pages',
        'uses' => 'Robust\Pages\Controllers\Admin\PageController@pagesByCategory',
    ]);

    Route::get('/categories/import', [
        'as' => 'categories.import',
        'uses' => 'Robust\Pages\Controllers\Admin\CategoryController@getImport',
    ]);
    Route::post('/categories/import', [
        'as' => 'categories.import',
        'uses' => 'Robust\Pages\Controllers\Admin\CategoryController@postImport',
    ]);


    Route::get('/categories/export', [
        'as' => 'categories.export',
        'uses' => 'Robust\Pages\Controllers\Admin\CategoryController@export',
    ]);
});

