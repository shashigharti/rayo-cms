<?php
Route::group(['prefix' => config('core.frw.uri'), 'as' => 'admin.', 'group' => 'Mls Users'], function () {
    Route::get('mlsuser/data-map/{id}', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsDataMapController@index',
        'as' => 'mlsuser.data-map'
    ]);

    Route::get('mlsuser/other-data/{id}', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsDataMapController@other',
        'as' => 'mlsuser.other-data'
    ]);

    Route::get('mlsuser/field-details/{id}', [
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsDataMapController@fieldDetails',
        'as' => 'mlsuser.field-details'
    ]);

    Route::post('mlsuser/data-map/{id}/store',[
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsDataMapController@store',
        'as' => 'mlsuser.data-map.store'
    ]);

    Route::post('mlsuser/other-data/{id}/store',[
        'uses' => '\Robust\RealEstate\Controllers\Admin\MlsDataMapController@storeAdditional',
        'as' => 'mlsuser.other-data.store'
    ]);

    Route::post('mlsuser/data-map/fields',[
       'uses' =>  '\Robust\RealEstate\Controllers\Admin\MlsDataMapController@getFieldValues',
        'as' => 'mlsuser.data-map.fields'
    ]);

    Route::post('mlsuser/data-map/classes',[
        'uses' =>  '\Robust\RealEstate\Controllers\Admin\MlsDataMapController@getClasses',
        'as' => 'mlsuser.data-map.classes'
    ]);

    Route::post('mlsuser/other-data/fields',[
        'uses' =>  '\Robust\Mls\Controllers\Admin\MlsDataMapController@additionalFields',
        'as' => 'mlsuser.other-data.fields'
    ]);

    Route::post('mlsuser/field/details/table',[
        'uses' =>  '\Robust\RealEstate\Controllers\Admin\MlsDataMapController@getFieldTable',
        'as' => 'mlsuser.field-details.table'
    ]);

    Route::post('mlsuser/field/details/upload/{id}',[
        'uses' =>  '\Robust\RealEstate\Controllers\Admin\MlsDataMapController@uploadFieldDetails',
        'as' => 'mlsuser.field-details.upload'
    ]);
});
