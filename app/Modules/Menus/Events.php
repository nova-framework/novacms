<?php
Event::listen('backend.menu.quickcreate', function($user) {
    if ($user->hasRole('administrator')) {
        $items = array(
            array(
                'uri'    => 'menus/create',
                'title'  => 'Create Menu',
                'icon'   => 'sitemap',
                'weight' => 1,
            )
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
                'uri'    => 'menus',
                'title'  => __d('system', 'Menus'),
                'icon'   => 'sitemap',
                'weight' => 1,
            ),
        );
    } else {
        $items = array();
    }

    return $items;
});
