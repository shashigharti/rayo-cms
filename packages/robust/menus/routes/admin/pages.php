<?php

Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Pages'], function () {
    Route::resource('pages', '\Robust\Pages\Controllers\Admin\PageController');


    Route::post('page/{id}/changestatus', [
        'as' => 'pages.changestatus',
        'uses' => '\Robust\Pages\Controllers\Admin\PageController@changeStatus'
    ]);

    Route::get('/page/import', [
        'as' => 'page.import',
        'uses' => 'Robust\Pages\Controllers\Admin\PageController@getImport',
    ]);

    Route::post('/pages/import', [
        'as' => 'pages.import',
        'uses' => 'Robust\Pages\Controllers\Admin\PageController@postImport',
    ]);

    Route::get('/pages/export', [
        'as' => 'pages.export',
        'uses' => 'Robust\Pages\Controllers\Admin\PageController@export',
    ]);

});


