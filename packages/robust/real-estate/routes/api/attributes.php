<?php
Route::group([
    'prefix' => 'api',
    'as' => 'api.realestate.',
    'group' => 'Attributes'],
    function () {

       Route::get('attributes', [
        'name' =>'Attributes',
        'as' => 'attributes',
        'uses' => '\Robust\RealEstate\Controllers\API\AttributeController@index'
        ]);

        Route::get('attributes/{property_name}', [
        'name' =>'Attributes By Property Name',
        'as' => 'attributes.property_name',
        'uses' => '\Robust\RealEstate\Controllers\API\AttributeController@getAttributesListByPropertyName'
        ]);

});
