<?php
Event::listen('backend.menu.quickcreate', function($user) {
    $items = array(
        array(
            'uri'    => 'menus/create',
            'title'  => 'Create Menu',
            'icon'   => 'sitemap',
            'weight' => 1,
        )
    );

    return $items;
});

Event::listen('backend.menu', function($user) {
    $items = array(
        array(
            'uri'    => 'menus',
            'title'  => __d('system', 'Menus'),
            'icon'   => 'sitemap',
            'weight' => 1,
        ),
    );

    return $items;
});
