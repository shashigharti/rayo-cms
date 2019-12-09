<?php
Route::group([
    'prefix' => 'real-estate',
    'as' => 'website.realestate.leads.',
    'group' => 'Notes'],
    function () {
       Route::post('/leads/notes',[
           'name' =>'Lead Notes',
           'as' => 'notes',
           'uses' => 'Robust\RealEstate\Controllers\Website\Leads\NoteController@store'
       ]);
    });
