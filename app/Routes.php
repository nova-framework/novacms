<?php
/**
 * Routes - all standard Routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */


/** Define static routes. */

// The default Routing
// The default Auth Routes.
Route::get('login',  array(
    'before' => 'guest',
    'uses' => 'Admin\Authorize@login'
));

Route::post('login', array(
    'before' => 'guest|csrf',
    'uses' => 'Admin\Authorize@postLogin'
));

Route::get('logout', array(
    'before' => 'auth',
    'uses' => 'Admin\Authorize@logout'
));

// The Password Remind.
Route::get('password/remind', array(
    'before' => 'guest',
    'uses' => 'Admin\Authorize@remind'
));

Route::post('password/remind', array(
    'before' => 'guest|csrf',
    'uses' => 'Admin\Authorize@postRemind'
));

// The Password Reset.
Route::get('password/reset/{token}', array(
    'before' => 'guest',
    'uses' => 'Admin\Authorize@reset'
));

Route::post('password/reset', array(
    'before' => 'guest|csrf',
    'uses' => 'Admin\Authorize@postReset'
));

// The Adminstration Routes.
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin'), function() {
    //admin
    Route::get('/',         array('before' => 'auth', 'uses' => 'Dashboard@index'));
    Route::get('dashboard', array('before' => 'auth', 'uses' => 'Dashboard@index'));

    //settings
    Route::get( 'settings', array('before' => 'auth',      'uses' => 'Settings@index'));
    Route::post('settings', array('before' => 'auth|csrf', 'uses' => 'Settings@store'));

    // The User's Profile.
    Route::get( 'users/profile', array('before' => 'auth',      'uses' => 'Users@profile'));
    Route::post('users/profile', array('before' => 'auth|csrf', 'uses' => 'Users@postProfile'));

    // The Users CRUD.
    Route::get( 'users',                array('before' => 'auth',      'uses' => 'Users@index'));
    Route::get( 'users/create',         array('before' => 'auth',      'uses' => 'Users@create'));
    Route::post('users',                array('before' => 'auth|csrf', 'uses' => 'Users@store'));
    Route::get( 'users/{id}',         array('before' => 'auth',      'uses' => 'Users@show'));
    Route::get( 'users/{id}/edit',    array('before' => 'auth',      'uses' => 'Users@edit'));
    Route::post('users/{id}',         array('before' => 'auth|csrf', 'uses' => 'Users@update'));
    Route::post('users/{id}/destroy', array('before' => 'auth|csrf', 'uses' => 'Users@destroy'));

    // The Users Search.
    Route::post( 'users/search', array('before' => 'auth', 'uses' => 'Users@search'));

    // The Roles CRUD.
    Route::get( 'roles',                array('before' => 'auth',      'uses' => 'Roles@index'));
    Route::get( 'roles/create',         array('before' => 'auth',      'uses' => 'Roles@create'));
    Route::post('roles',                array('before' => 'auth|csrf', 'uses' => 'Roles@store'));
    Route::get( 'roles/{id}',         array('before' => 'auth',      'uses' => 'Roles@show'));
    Route::get( 'roles/{id}/edit',    array('before' => 'auth',      'uses' => 'Roles@edit'));
    Route::post('roles/{id}',         array('before' => 'auth|csrf', 'uses' => 'Roles@update'));
    Route::post('roles/{id}/destroy', array('before' => 'auth|csrf', 'uses' => 'Roles@destroy'));

    // The Pages CRUD.
    Route::get( 'pages',                array('before' => 'auth',      'uses' => 'Pages@index'));
    Route::get( 'pages/create',         array('before' => 'auth',      'uses' => 'Pages@create'));
    Route::post('pages',                array('before' => 'auth|csrf', 'uses' => 'Pages@store'));
    Route::get( 'pages/{id}/edit',    array('before' => 'auth',      'uses' => 'Pages@edit'));
    Route::get( 'pages/restorerevision/{id}',    array('before' => 'auth',      'uses' => 'Pages@restoreRevision'));
    Route::post('pages/{id}/destroy', array('before' => 'auth|csrf', 'uses' => 'Pages@destroy'));
    Route::post('pages/pageblocks/{id}/destroy', array('before' => 'auth|csrf', 'uses' => 'Pages@destroyPageBlock'));
    Route::post('pages/updatepageblocks', array('before' => 'auth|csrf', 'uses' => 'Pages@updatePageBlocks'));
    Route::post('pages/{id}',         array('before' => 'auth|csrf', 'uses' => 'Pages@update'));

    //Global Blocks
    Route::get( 'globalblocks',                array('before' => 'auth',      'uses' => 'GlobalBlocks@index'));
    Route::post('globalblocks/{id}/destroy', array('before' => 'auth|csrf', 'uses' => 'GlobalBlocks@destroy'));
    Route::post('globalblocks/update', array('before' => 'auth|csrf', 'uses' => 'GlobalBlocks@update'));

    // The Sidebars CRUD.
    Route::get( 'sidebars',                array('before' => 'auth',      'uses' => 'Sidebars@index'));
    Route::get( 'sidebars/create',         array('before' => 'auth',      'uses' => 'Sidebars@create'));
    Route::post('sidebars',                array('before' => 'auth|csrf', 'uses' => 'Sidebars@store'));
    Route::get( 'sidebars/{id}/edit',    array('before' => 'auth',      'uses' => 'Sidebars@edit'));
    Route::post('sidebars/{id}',         array('before' => 'auth|csrf', 'uses' => 'Sidebars@update'));
    Route::post('sidebars/{id}/destroy', array('before' => 'auth|csrf', 'uses' => 'Sidebars@destroy'));

    // The Menus CRUD.
    Route::get( 'menus',                array('before' => 'auth',      'uses' => 'Menus@index'));
    Route::get( 'menus/create',         array('before' => 'auth',      'uses' => 'Menus@create'));
    Route::post('menus',                array('before' => 'auth|csrf', 'uses' => 'Menus@store'));
    Route::get( 'menus/{id}/edit',    array('before' => 'auth',      'uses' => 'Menus@edit'));
    Route::get( 'menus/{id}/manage',    array('before' => 'auth',      'uses' => 'Menus@manage'));
    Route::post( 'menus/{id}/manage',    array('before' => 'auth',      'uses' => 'Menus@manageUpdate'));
    Route::post('menus/{id}',         array('before' => 'auth|csrf', 'uses' => 'Menus@update'));
    Route::post('menus/{id}/destroy', array('before' => 'auth|csrf', 'uses' => 'Menus@destroy'));

    Route::get( 'editor',                array('before' => 'auth',      'uses' => 'Editor@index'));
});

Route::any('{slug}', 'Pages@fetch')->where('slug', '(.*)');

/** End default Routes */
