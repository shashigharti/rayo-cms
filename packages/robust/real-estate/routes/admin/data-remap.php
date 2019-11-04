<?php
Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Mls Users'], function () {
    Route::get('mlsuser/data-remap/{id}', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsDataRemapController@index',
        'as' => 'mlsuser.data-remap'
    ]);
    Route::post('mlsuser/data/remap/field', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsDataRemapController@getField',
        'as' => 'mlsuser.data-remap.field'
    ]);
    Route::post('mlsuser/data/remap/store/{id}', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsDataRemapController@store',
        'as' => 'mlsuser.data-remap.store'
    ]);
    Route::get('mlsuser/data/remap/add-field',[
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsDataRemapController@addField',
        'as' => 'mlsuser.data-remap.add-field'
    ]);
});
