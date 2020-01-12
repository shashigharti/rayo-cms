<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.',
    'group' => 'Listing'],
    function () {
        Route::get('/real-estate/{slug}', [
            'name' => 'Single Listing',
            'as' => 'single',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@single'
        ]);

        Route::get('/' . settings('real-estate', 'url_active') . '/{location_type?}/{location?}', [
            'name' => 'Homes for sale in',
            'as' => 'homes-for-sale',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@active'
        ]);
        Route::get('/' . settings('real-estate', 'url_active') . '/{location_type?}/{location?}/price/{price?}', [
            'name' => 'Homes for sale in',
            'as' => 'homes-for-sale.location&price',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@active'
        ]);

        Route::get('/' . settings('real-estate', 'url_sold') . '/{location_type?}/{location?}', [
            'name' => 'Homes for sale in',
            'as' => 'sold-homes',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@sold'
        ]);
        Route::get('/' . settings('real-estate', 'url_sold') . '/{location_type?}/{location?}/price/{price?}', [
            'name' => 'Homes for sale in',
            'as' => 'sold-homes.location&price',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@sold'
        ]);

//        Route::get('/' . config('real-estate.frw.active') . '/{location_type?}/{location?}/{price?}/{sub_area}',[
//            'name' =>'Homes for sale in',
//            'as' => 'homes-for-sale.sub_area',
//            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@subArea'
//        ]);
//
//        Route::post('/' . config('real-estate.frw.active') . '/map',[
//            'name' =>'Map Data',
//            'as' => 'map-data',
//            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@mapData'
//        ]);
//        Route::get('/' . config('real-estate.frw.active') . '/{type}/{value}/{id}',[
//            'name' =>'Similar Listing',
//            'as' => 'listings.similar',
//            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@getSimilarProperty'
//        ]);
//        Route::get('/' . config('real-estate.frw.active') . '/{slug}/print', [
//            'name' =>'print Listing',
//            'as' => 'print',
//            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@print'
//        ]);
    });
