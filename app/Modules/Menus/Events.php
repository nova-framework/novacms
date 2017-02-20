<?php
Event::listen('backend.menu', function($user) {
    if ($user->hasRole('administrator')) {
        $items = array(
            array(
                'uri'    => 'menus',
                'title'  => __d('system', 'Menus'),
                'icon'   => 'list',
                'weight' => 1,
            ),
        );
    } else {
        $items = array();
    }

    return $items;
});
