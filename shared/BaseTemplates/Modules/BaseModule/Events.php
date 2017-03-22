<?php
/**
 * Events - all Module's specific Events are defined here.
 *
 */

Event::listen('backend.menu.modules', function($user) {
    if ($user->hasRole('administrator')) {
        $items = array(
            array(
                'uri'    => 'BaseModuleSlug',
                'title'  => __d('BaseModuleSlug', 'BaseModuleTitle'),
                'icon'   => 'cubes',
                'weight' => 1,
            ),
        );
    } else {
        $items = array();
    }

    return $items;
});
