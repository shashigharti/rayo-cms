<?php
Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Mls Users'], function () {
    Route::resource('mlsuser', '\Robust\Mls\Controllers\Admin\MlsUserController');
    Route::get('mlsuser/metadata/{id}', [
        'uses' => '\Robust\Mls\Controllers\Admin\MlsUserController@metadata',
        'as' => 'mlsuser.metadata'
    ]);
    Route::get('mlsuser/generate/{id}',[
       'uses' =>'\Robust\Mls\Controllers\Admin\MlsUserController@generate',
       'as' => 'mlsuser.generate'
    ]);
    Route::get('/mls/fill/{id}',[
        'uses' =>'\Robust\Mls\Controllers\Admin\MlsDataMapController@storeArray',
        'as' => 'mls.data.fill'
    ]);
    Route::get('/mls/pull/{id}',[
        'uses' =>'\Robust\Mls\Controllers\Admin\MlsDataMapController@pullData',
        'as' => 'mls.data.pull'
    ]);
});

