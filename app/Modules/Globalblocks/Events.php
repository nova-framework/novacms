<?php
Event::listen('backend.menu', function($user) {
    $items = array(
        array(
            'uri'    => 'globalblocks',
            'title'  => __d('globalblocks', 'Global Blocks'),
            'icon'   => 'cubes',
            'weight' => 1,
        ),
    );
    return $items;
});
