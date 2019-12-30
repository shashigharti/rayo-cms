<?php
Route::group([
    'prefix' => config('real-estate.frw.website'),
    'as' => 'website.realestate.leads.',
    'group' => 'Notes'],
    function () {
       Route::post('/leads/notes',[
           'name' =>'Lead Notes',
           'as' => 'notes',
           'uses' => 'Robust\RealEstate\Controllers\Website\Leads\NoteController@store'
       ]);
    });
