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
        Route::get('/ct/{banner_slug}/{tab?}/{tab_slug?}/{location_slug?}', [
            'name' => 'Banner Custom Listings Without Price',
            'as' => 'ct.listings.tabs.without-price',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@getCustomListingsForTabsWithoutPrice'
        ]);
        Route::get('/' . settings('real-estate', 'url_active') . '/{location_type?}/{location?}', [
            'name' => 'Homes for sale',
            'as' => 'homes-for-sale',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@active'
        ]);
        Route::get('/' . settings('real-estate', 'url_sold') . '/{location_type?}/{location?}', [
            'name' => 'Homes for sale',
            'as' => 'sold-homes',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@sold'
        ]);
        Route::get('/' . settings('real-estate', 'url_active') . '/{type}/{value}/{id}', [
            'name' => 'Similar Listing',
            'as' => 'listings.similar',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@getSimilarProperty'
        ]);
        Route::get('/' . settings('real-estate', 'url_active') . '/{slug}/print', [
            'name' => 'print Listing',
            'as' => 'print',
            'uses' => '\Robust\RealEstate\Controllers\Website\ListingController@print'
        ]);
    });
