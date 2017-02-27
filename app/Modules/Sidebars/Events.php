<?php
Event::listen('backend.menu', function($user) {
    if ($user->hasRole('administrator')) {
        $items = array(
            array(
                'uri'    => 'sidebars',
                'title'  => __d('sidebars', 'Sidebars'),
                'icon'   => 'cubes',
                'weight' => 1,
            ),
        );
    } else {
        $items = array();
    }

    return $items;
});
