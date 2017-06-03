<?php
Event::listen('backend.menu.quickcreate', function($user) {
    if ($user->hasRole('administrator')) {
        $items = array(
            array(
                'uri'    => 'depts/create',
                'title'  => 'Create Dept',
                'icon'   => 'archive',
                'weight' => 1,
            ),
            array(
                'uri'    => 'users/create',
                'title'  => 'Create User',
                'icon'   => 'user',
                'weight' => 1,
            ),
            array(
                'uri'    => 'roles/create',
                'title'  => 'Create User Role',
                'icon'   => 'user',
                'weight' => 1,
            ),
        );
    } else {
        $items = array(
            array(
                'uri'    => 'depts/create',
                'title'  => 'Create Dept',
                'icon'   => 'archive',
                'weight' => 1,
            ),
        );
    }
    return $items;
});

Event::listen('backend.menu', function($user) {

    $items = array(
        array(
            'uri'    => 'dashboard',
            'title'  => __d('system', 'Dashboard'),
            'icon'   => 'dashboard',
            'weight' => 0,
        ),
        array(
            'uri'    => 'users',
            'title'  => __d('system', 'Users'),
            'icon'   => 'users',
            'weight' => 999,
        ),
        array(
            'uri'    => 'depts',
            'title'  => __d('system', 'Depts'),
            'icon'   => 'archive',
            'weight' => 999,
        ),
    );

    return $items;
});

Event::listen('backend.menu.system', function($user) {
    if ($user->hasRole('administrator')) {
        $items = array(
            array(
                'uri'    => 'settings',
                'title'  => __d('system', 'Settings'),
                'icon'   => 'cogs',
                'weight' => 999,
            ),
            array(
                'uri'    => 'userlogs',
                'title'  => __d('system', 'User Logs'),
                'icon'   => 'book',
                'weight' => 999,
            ),
            array(
                'uri'    => 'errorlog',
                'title'  => __d('system', 'Error Logs'),
                'icon'   => 'book',
                'weight' => 999,
            ),
            array(
                'uri'    => 'roles',
                'title'  => __d('system', 'Roles'),
                'icon'   => 'book',
                'weight' => 999,
            ),
        );
    } else {
        $items = array();
    }

    return $items;
});
