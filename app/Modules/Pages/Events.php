<?php
Event::listen('backend.menu', function($user) {
    if ($user->hasRole('administrator')) {
        $items = array(
            array(
                'uri'    => 'pages',
                'title'  => __d('system', 'Pages'),
                'icon'   => 'book',
                'weight' => 1,
            ),
        );
    } else {
        $items = array();
    }

    return $items;
});
