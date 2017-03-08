<?php
Route::group(array('prefix' => 'admin'), function() {
    Route::get('login',                    array('before' => 'guest',           'uses' => 'Authorise@login'));

    Route::get('login/magiclink',          array('before' => 'guest',           'uses' => 'Authorise@magicLink'));
    Route::post('login/magiclink',         array('before' => 'guest|csrf',     'uses' => 'Authorise@sendToken'));
    Route::get('login/magiclink/{token}',  array('before' => 'guest',           'uses' => 'Authorise@magicLinkLogin'));

    Route::post('login',                   array('before' => 'guest|csrf',      'uses' => 'Authorise@postLogin'));
    Route::post('logout',                  array('before' => 'auth',            'uses' => 'Authorise@logout'));

    // The Password Remind.
    Route::get('password/remind',          array('before' => 'guest',           'uses' => 'Authorise@remind'));
    Route::post('password/remind',         array('before' => 'guest|csrf',      'uses' => 'Authorise@postRemind'));

    // The Password Reset.
    Route::get('password/reset/{token}',   array('before' => 'guest',           'uses' => 'Authorise@reset'));
    Route::post('password/reset',          array('before' => 'guest|csrf',      'uses' => 'Authorise@postReset'));

    Route::get('/',                        array('before' => 'auth',            'uses' => 'Dashboard@index'));
    Route::get('dashboard',                array('before' => 'auth',            'uses' => 'Dashboard@index'));

    Route::get('notifications', 'Notifications@index');
    Route::get('notifications/getnotifications', 'Notifications@getNotifications');
    Route::get('notifications/getnotificationscount', 'Notifications@getNotificationsCount');
    Route::get('notifications/removenotificationscount', 'Notifications@removeNotificationsCount');

    // The Users CRUD.
    Route::get( 'users',                   array('before' => 'auth',            'uses' => 'Users@index'));
    Route::get( 'users/create',            array('before' => 'auth|admin',      'uses' => 'Users@create'));
    Route::post('users',                   array('before' => 'auth|admin|csrf', 'uses' => 'Users@store'));
    Route::get( 'users/profile',           array('before' => 'auth',            'uses' => 'Users@show'));
    Route::get( 'users/{id}',              array('before' => 'auth',            'uses' => 'Users@show'));
    Route::get( 'users/{id}/edit',         array('before' => 'auth',            'uses' => 'Users@edit'));
    Route::post('users/{id}',              array('before' => 'auth|csrf',       'uses' => 'Users@update'));
    Route::post('users/{id}/destroy',      array('before' => 'auth|admin|csrf', 'uses' => 'Users@destroy'));
    Route::get('users/export/{type}',      array('before' => 'auth|admin',      'uses' => 'Users@export'));

    //top level users only

    //developer login in user
    Route::post('users/loginas', function() {

        //get the id from the post
        $id = Input::get('user_id');

        //if session exists remove it and return login to original user
        if (Session::get('hasClonedUser') == 1) {
            Auth::loginUsingId(Session::remove('hasClonedUser'));
            Session::remove('hasClonedUser');
            return Redirect::back(302);
        }

        //only run for developer, clone selected user and create a cloned session
        if (Auth::user()->id == 1) {
            Session::put('hasClonedUser', Auth::user()->id);
            Auth::loginUsingId($id);
            return Redirect::back(302);
        }
    });

    //settings
    Route::get( 'settings',                array('before' => 'auth|admin',       'uses' => 'Settings@index'));
    Route::post('settings',                array('before' => 'auth|admin| csrf', 'uses' => 'Settings@store'));

    //depts
    Route::get( 'depts',                   array('before' => 'auth|admin',      'uses' => 'Depts@index'));
    Route::get( 'depts/create',            array('before' => 'auth|admin',      'uses' => 'Depts@create'));
    Route::post('depts',                   array('before' => 'auth|admin|csrf', 'uses' => 'Depts@store'));
    Route::get( 'depts/{id}/edit',         array('before' => 'auth|admin',      'uses' => 'Depts@edit'));
    Route::post('depts/{id}',              array('before' => 'auth|admin|csrf', 'uses' => 'Depts@update'));
    Route::post('depts/{id}/destroy',      array('before' => 'auth|admin|csrf', 'uses' => 'Depts@destroy'));
    Route::get('depts/export/{type}',      array('before' => 'auth|admin',      'uses' => 'Depts@export'));

    //roles
    Route::get( 'roles',                   array('before' => 'auth|admin',      'uses' => 'Roles@index'));
    Route::get( 'roles/create',            array('before' => 'auth|admin',      'uses' => 'Roles@create'));
    Route::post('roles',                   array('before' => 'auth|admin|csrf', 'uses' => 'Roles@store'));
    Route::get( 'roles/{id}/edit',         array('before' => 'auth|admin',      'uses' => 'Roles@edit'));
    Route::post('roles/{id}',              array('before' => 'auth|admin|csrf', 'uses' => 'Roles@update'));
    Route::post('roles/{id}/destroy',      array('before' => 'auth|admin|csrf', 'uses' => 'Roles@destroy'));
    Route::get('roles/export/{type}',      array('before' => 'auth|admin',      'uses' => 'Roles@export'));

    //error log
    Route::get('errorlog',                 array('before' => 'auth|admin',      'uses' => 'Errors@errorLog'));
    Route::post('errorlog',                array('before' => 'auth|admin|csrf', 'uses' => 'Errors@clear'));

    //user logs
    Route::get('userlogs',                 array('before' => 'auth|admin',      'uses' => 'UserLogs@index'));
    Route::get('userlogs/export/{type}',   array('before' => 'auth|admin',      'uses' => 'UserLogs@export'));
});
