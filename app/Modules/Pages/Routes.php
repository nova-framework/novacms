<?php
Route::group(array('prefix' => 'admin'), function() {
    Route::get( 'pages',                         array('before' => 'auth',      'uses' => 'Admin@index'));
    Route::get( 'pages/create',                  array('before' => 'auth',      'uses' => 'Admin@create'));
    Route::post('pages',                         array('before' => 'auth|csrf', 'uses' => 'Admin@store'));
    Route::get( 'pages/{id}/edit',               array('before' => 'auth',      'uses' => 'Admin@edit'));
    Route::get( 'pages/restorerevision/{id}',    array('before' => 'auth',      'uses' => 'Admin@restoreRevision'));
    Route::post('pages/{id}/destroy',            array('before' => 'auth|csrf', 'uses' => 'Admin@destroy'));
    Route::post('pages/pageblocks/{id}/destroy', array('before' => 'auth|csrf', 'uses' => 'Admin@destroyPageBlock'));
    Route::post('pages/updatepageblocks',        array('before' => 'auth|csrf', 'uses' => 'Admin@updatePageBlocks'));
    Route::post('pages/{id}',                    array('before' => 'auth|csrf', 'uses' => 'Admin@update'));
});

Route::post('page',  array('before' => 'auth|csrf', 'uses' => 'Pages@updateAjax'));
Route::get('{slug}', 'Pages@fetch')->where('slug', '(.*)');
