<?php
Route::group(array('prefix' => 'cp', 'namespace' => 'App\Modules\Menus\Controllers'), function() {
    Route::get( 'menus',                array('before' => 'auth',      'uses' => 'Admin@index'));
    Route::get( 'menus/create',         array('before' => 'auth',      'uses' => 'Admin@create'));
    Route::post('menus',                array('before' => 'auth|csrf', 'uses' => 'Admin@store'));
    Route::get( 'menus/{id}/edit',    array('before' => 'auth',        'uses' => 'Admin@edit'));
    Route::get( 'menus/{id}/manage',    array('before' => 'auth',      'uses' => 'Admin@manage'));
    Route::post( 'menus/{id}/manage',    array('before' => 'auth',     'uses' => 'Admin@manageUpdate'));
    Route::post('menus/{id}',         array('before' => 'auth|csrf',   'uses' => 'Admin@update'));
    Route::post('menus/{id}/destroy', array('before' => 'auth|csrf',   'uses' => 'Admin@destroy'));
});
