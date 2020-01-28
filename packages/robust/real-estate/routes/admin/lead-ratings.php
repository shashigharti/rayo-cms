<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Ratings'], function () {
    Route::resources([
		'ratings' => 'Robust\RealEstate\Controllers\Admin\LeadRatingsController'
    ]);

    Route::post('leads/{id}/ratings',[
        'name' =>'Lead Details Page',
        'as' => 'lead.store.ratings',
        'uses' => '\Robust\RealEstate\Controllers\Admin\LeadRatingsController@storeLeadRating'
    ]);
});

