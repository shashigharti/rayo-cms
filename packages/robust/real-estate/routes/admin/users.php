<?php
Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Mls Users'], function () {
    Route::resource('mlsuser', '\Robust\RealEstate\Controllers\Admin\MlsUserController');
    Route::get('mlsuser/metadata/{id}', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsUserController@metadata',
        'as' => 'mlsuser.metadata'
    ]);
    Route::get('mlsuser/generate/{id}',[
       'uses' =>'\Robust\RealEstate\Controllers\Admin\MlsUserController@generate',
       'as' => 'mlsuser.generate'
    ]);
    Route::get('/mls/fill/{id}',[
        'uses' =>'\Robust\RealEstate\Controllers\Admin\MlsDataMapController@storeArray',
        'as' => 'mls.data.fill'
    ]);
    Route::get('/mls/pull/{id}',[
        'uses' =>'\Robust\RealEstate\Controllers\Admin\MlsDataMapController@pullData',
        'as' => 'mls.data.pull'
    ]);
});

