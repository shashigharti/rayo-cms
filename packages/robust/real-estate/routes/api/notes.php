<?php
Route::group(['prefix' => config('core.frw.api'), 'as' => 'api.', 'group' => 'Lead Followups'], function () {
    Route::resource('notes/leads', '\Robust\RealEstate\Controllers\Api\LeadNoteController');
});
