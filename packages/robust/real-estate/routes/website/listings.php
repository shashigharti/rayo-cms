<?php
Route::group([
    //'prefix' => 'real-estate',
    'as' => 'website.realestate.',
    'group' => 'Listing'],
    function () {

        //added prefix as it was affecting others routes
        Route::get('/real-estate/{id}/{slug}', [
            'name' =>'Single Listing',
            'as' => 'single',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@single'
        ]);      

        Route::get('/homes-for-sale/{location_type?}/{location?}/{price?}',[
            'name' =>'Homes for sale in',
            'as' => 'homes-for-sale',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@active'
        ]);
         Route::get('/sold-homes/{location_type?}/{location?}/{price?}',[
            'name' =>'Homes for sale in',
            'as' => 'sold-homes',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@sold'
        ]);
        // Route::get('/homes-for-sale/{type}/{value}/{id}',[
        //     'name' =>'Similar Listing',
        //     'as' => 'listings.similar',
        //     'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@getSimilarProperty'
        // ]);
});