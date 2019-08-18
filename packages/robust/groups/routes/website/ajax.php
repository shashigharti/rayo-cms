<?php
Route::group(['as' => 'robust.website.ajax.', 'group' => 'Pages'], function () {

    Route::get('ajax/page/{slug}', [
        'as' => 'page.render',
        'uses' => '\Robust\Pages\Controllers\Website\Ajax\PageController@getPage'
    ]);
});