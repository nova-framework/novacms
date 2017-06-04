<?php
Event::listen('backend.menu.quickcreate', function($user) {
    $items = array(
        array(
            'uri'    => 'BaseModuleSlug/create',
            'title'  => __d('BaseModuleSlug', 'Create BaseModuleTitle'),
            'icon'   => 'cubes',
            'weight' => 1,
        ),
    );

    return $items;
});

Event::listen('backend.menu.modules', function($user) {
    $items = array(
        array(
            'uri'    => 'BaseModuleSlug',
            'title'  => __d('BaseModuleSlug', 'BaseModuleTitle'),
            'icon'   => 'cubes',
            'weight' => 1,
        ),
    );

    return $items;
});
