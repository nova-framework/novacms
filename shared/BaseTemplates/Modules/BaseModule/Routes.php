<?php
/**
 * Routes - all Module's specific Routes are defined here.
 *
 */
Route::group(array('prefix' => 'admin'), function() {
    Route::get( 'BaseModuleSlug',                array('before' => 'auth',      'uses' => 'Admin@index'));
    Route::get( 'BaseModuleSlug/create',         array('before' => 'auth',      'uses' => 'Admin@create'));
    Route::post('BaseModuleSlug',                array('before' => 'auth|csrf', 'uses' => 'Admin@store'));
    Route::get( 'BaseModuleSlug/{id}/edit',      array('before' => 'auth',      'uses' => 'Admin@edit'));
    Route::post('BaseModuleSlug/{id}',           array('before' => 'auth|csrf', 'uses' => 'Admin@update'));
    Route::post('BaseModuleSlug/{id}/destroy',   array('before' => 'auth|csrf', 'uses' => 'Admin@destroy'));
    Route::get('BaseModuleSlug/export/{type}',   array('before' => 'auth|',     'uses' => 'Admin@export'));
});


