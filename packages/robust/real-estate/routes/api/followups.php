<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Lead Followups'], function () {
    Route::resource('followups/leads', '\Robust\RealEstate\Controllers\Api\LeadFollowUpController');
});
