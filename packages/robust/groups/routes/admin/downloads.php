<?php

Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.page.', 'group' => 'Pages'], function () {

    Route::resource('page/downloads', '\Robust\Pages\Controllers\Admin\DownloadController');

    Route::get('page/{page}/downloads', [
        'name'=>'Page Downloads',
        'as' => 'downloads.get-page-downloads',
        'uses' => '\Robust\Pages\Controllers\Admin\PageController@getDownloadsByPage'
    ]);

    Route::get('/downloads/import', [
        'as' => 'downloads.import',
        'uses' => 'Robust\Pages\Controllers\Admin\DownloadController@getImport',
    ]);
    Route::post('/downloads/import', [
        'as' => 'downloads.import',
        'uses' => 'Robust\Pages\Controllers\Admin\DownloadController@postImport',
    ]);

    Route::get('/pages/export', [
        'as' => 'pages.export',
        'uses' => 'Robust\Pages\Controllers\Admin\PageController@export',
    ]);
});

