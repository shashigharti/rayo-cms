<?php
Route::group([
    //'prefix' => 'real-estate',
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
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@sold'
        ]);

        Route::get('/{id}/{slug}', [
            'name' =>'Single Listing',
            'as' => 'single',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@single'
        ]);

        Route::get('//homes-for-sale/{type}/{value}/{id}',[
            'name' =>'Similar Listing',
            'as' => 'listings.similar',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@getSimilarProperty'
        ]);

        Route::get('/homes-for-sale/city/{city}',[
            'name' =>'Homes for sale in',
            'as' => 'city',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@byCity'
        ]);

        Route::get('/homes-for-sale/city/{city}/price/{price}',[
            'name' =>'Homes for sale in',
            'as' => 'city.price',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@byCityPrice'
        ]);

        Route::post('search',[
           'name' => 'Search',
           'as' => 'search',
           'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@search'
        ]);

});
