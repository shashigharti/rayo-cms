<?php
Route::group([
    'prefix' => 'real-estate',
    'as' => 'website.realestate.',
    'group' => 'Listing'],
    function () {

        Route::get('/homes-for-sale', [
            'name' =>'Homes for sale',
            'as' => 'homes-for-sale',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@index'
        ]);

        Route::get('/sold-homes', [
            'name' =>'Sold Homes',
            'as' => 'sold-homes',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@index'
        ]);

        Route::get('/{id}/{slug}', [
            'name' =>'Single Listing',
            'as' => 'single',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@single'
        ]);
});
