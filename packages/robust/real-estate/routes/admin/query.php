<?php
Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Mls Users'], function () {
    Route::get('mlsuser/query/{id}', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsQueryController@index',
        'as' => 'mlsuser.query'
    ]);
    Route::post('mlsuser/query/store/{id}', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsQueryController@store',
        'as' => 'mlsuser.query.store'
    ]);
    Route::get('mlsuser/query-filter/fields', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsQueryController@addField',
        'as' => 'mlsuser.query.field'
    ]);
});
