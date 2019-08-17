<?php
Route::get('category/{slug}', ['uses' => '\Robust\Pages\Controllers\Website\PageController@getCategory', 'as' => 'robust.category']);
Route::get('content/search', [
    'as' => 'page.search',
    'uses' => '\Robust\Pages\Controllers\Website\PageController@searchContent'
]);
Route::get('page/{slug}', ['uses' => '\Robust\Pages\Controllers\Website\PageController@getPage', 'name' => 'Page', 'as' => 'robust.pages']);
