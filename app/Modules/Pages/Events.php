<?php
Event::listen('backend.menu.quickcreate', function($user) {
    $items = array(
        array(
            'uri'    => 'pages/create',
            'title'  => 'Create Page',
            'icon'   => 'book',
            'weight' => 1,
        )
    );

    return $items;
});

Event::listen('backend.menu', function($user) {
    $items = array(
        array(
            'uri'    => 'pages',
            'title'  => __d('system', 'Pages'),
            'icon'   => 'book',
            'weight' => 1,
        ),
    );     

    return $items;
});
