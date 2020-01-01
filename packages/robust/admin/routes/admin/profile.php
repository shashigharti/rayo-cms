<?php
Route::group(['prefix' => config('core.frw.admin'), 'as' => 'admin.', 'group' => 'Profiles'], function () {
    Route::resource('profile.settings', '\Robust\Admin\Controllers\Admin\ProfileController', [
        'only' => [
            'edit','update'
        ]
    ]);
});