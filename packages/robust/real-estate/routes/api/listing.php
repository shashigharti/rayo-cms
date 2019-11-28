<?php
Route::group([
    'prefix' => 'api',
    'as' => 'api.website.realestate.',
    'group' => 'Listing'],
    function () {

        Route::get('/listings/homes-for-sale', [
            'name' =>'Listings',
            'as' => 'listings',
            'uses' => '\Robust\RealEstate\Controllers\Api\ListingController@getListings'
        ]);
});
