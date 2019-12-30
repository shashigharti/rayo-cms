<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.leads.',
    'group' => 'Frontend Authentication'],
    function () {

        Route::post('login', [
            'name' =>'Leads Login',
            'as' => 'login',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\LoginController@login'
        ]);

        Route::post('register', [
            'name' =>'Leads Register',
            'as' => 'register',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\RegisterController@register'
        ]);

        Route::get('logout', [
            'name' =>'Leads Logout',
            'as' => 'logout',
            'uses' => 'Robust\RealEstate\Controllers\Website\Leads\LoginController@logout'
        ]);

});
