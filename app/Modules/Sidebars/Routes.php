<?php
Route::group(array('prefix' => 'cp'), function() {
    Route::get( 'sidebars',                         array('before' => 'auth',      'uses' => 'Admin@index'));
    Route::get( 'sidebars/create',                  array('before' => 'auth',      'uses' => 'Admin@create'));
    Route::post('sidebars',                         array('before' => 'auth|csrf', 'uses' => 'Admin@store'));
    Route::get( 'sidebars/{id}/edit',               array('before' => 'auth',      'uses' => 'Admin@edit'));
    Route::post('sidebars/{id}/destroy',            array('before' => 'auth|csrf', 'uses' => 'Admin@destroy'));
    Route::post('sidebars/{id}',                    array('before' => 'auth|csrf', 'uses' => 'Admin@update'));
});
