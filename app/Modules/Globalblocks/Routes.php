<?php
Route::group(array('prefix' => 'admin'), function() {
    Route::get( 'globalblocks',                         array('before' => 'auth',      'uses' => 'Admin@index'));
    Route::post('globalblocks/{id}/destroy',            array('before' => 'auth|csrf', 'uses' => 'Admin@destroy'));
    Route::post('globalblocks/{id}',                    array('before' => 'auth|csrf', 'uses' => 'Admin@update'));
});
