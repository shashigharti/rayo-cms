<?php
Route::group(['prefix' => config('core.frw.api'), 
'as' => 'api.file-uploader.', 
'group' => 'File Uploader'], 
function () {
    Route::post('file-uploader/image/upload', [
        'name' =>'Send Files',
        'as' => 'image.upload',
        'uses' => '\Robust\Core\Controllers\API\FileUploadController@store'
    ]);
});
