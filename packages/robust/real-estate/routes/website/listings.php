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
        Route::get('/ct/{banner_slug}/price/{price}/{tab?}/{tab_slug?}', [
            'name' => 'Banner Custom Listings',
            'as' => 'ct.listings.banner',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@getCustomListingsForBanner'
        ]);
        Route::get('/' . settings('real-estate', 'url_active') . '/{location_type?}/{location?}', [
            'name' => 'Homes for sale',
            'as' => 'homes-for-sale',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@active'
        ]);
        Route::get('/' . settings('real-estate', 'url_active') . '/{location_type}/{location}/price/{price}', [
            'name' => 'Homes for sale',
            'as' => 'homes-for-sale.location&price',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@active'
        ]);
        Route::get('/' . settings('real-estate', 'url_sold') . '/{location_type?}/{location?}', [
            'name' => 'Homes for sale',
            'as' => 'sold-homes',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@sold'
        ]);
        Route::get('/' . settings('real-estate', 'url_sold') . '/{location_type?}/{location?}/price/{price?}', [
            'name' => 'Homes for sale',
            'as' => 'sold-homes.location&price',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@sold'
        ]);


//        Route::get('/' . settings('real-estate', 'url_active') . '/{location_type?}/{location?}/{price?}/{sub_area}',[
//            'name' =>'Homes for sale',
//            'as' => 'homes-for-sale.sub_area',
//            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@subArea'
//        ]);

//        Route::post('/' . settings('real-estate', 'url_active') . '/map',[
//            'name' =>'Map Data',
//            'as' => 'map-data',
//            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@mapData'
//        ]);
        Route::get('/' . settings('real-estate', 'url_active') . '/{type}/{value}/{id}',[
            'name' =>'Similar Listing',
            'as' => 'listings.similar',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@getSimilarProperty'
        ]);
        Route::get('/' . settings('real-estate', 'url_active') . '/{slug}/print', [
            'name' =>'print Listing',
            'as' => 'print',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@print'
        ]);

//        Route::get('/' . settings('real-estate', 'url_active') . '/{property_type}/{property_value}', [
//            'name' =>'Property Types',
//            'as' => 'property_type',
//            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@getListingsByPropertyType'
//        ]);
    });
