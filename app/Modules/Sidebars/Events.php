<?php
Event::listen('backend.menu.quickcreate', function($user) {
    $items = array(
        array(
            'uri'    => 'sidebars/create',
            'title'  => 'Create Sidebar',
            'icon'   => 'bars',
            'weight' => 1,
        ),
    );

    return $items;
});

Event::listen('backend.menu', function($user) {
    $items = array(
        array(
            'uri'    => 'sidebars',
            'title'  => __d('sidebars', 'Sidebars'),
            'icon'   => 'bars',
            'weight' => 1,
        ),
    );

    return $items;
});
