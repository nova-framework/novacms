<?php
Event::listen('backend.menu.quickcreate', function($user) {
    if ($user->hasRole('administrator')) {
        $items = array(
            array(
                'uri'    => 'sidebars/create',
                'title'  => 'Create Sidebar',
                'icon'   => 'bars',
                'weight' => 1,
            ),
        );
    } else {
        $items = array();
    }
    return $items;
});

Event::listen('backend.menu', function($user) {
    if ($user->hasRole('administrator')) {
        $items = array(
            array(
                'uri'    => 'sidebars',
                'title'  => __d('sidebars', 'Sidebars'),
                'icon'   => 'bars',
                'weight' => 1,
            ),
        );
    } else {
        $items = array();
    }

    return $items;
});
