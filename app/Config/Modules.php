<?php
/**
 * Modules Configuration
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */


return array(
    //--------------------------------------------------------------------------
    // Path to Modules
    //--------------------------------------------------------------------------

    'path' => APPDIR .'Modules',

    //--------------------------------------------------------------------------
    // Modules Base Namespace
    //--------------------------------------------------------------------------

    'namespace' => 'App\Modules\\',

    //--------------------------------------------------------------------------
    // Path to Cache
    //--------------------------------------------------------------------------

    'cache' => STORAGE_PATH .'modules.php',

    //--------------------------------------------------------------------------
    // Registered Modules
    //--------------------------------------------------------------------------

    'modules' => array(
        'files' => array(
            'namespace' => 'Files',
            'enabled'   => true,
            'order'     => 9001,
        ),
        'sidebars' => array(
            'namespace' => 'Sidebars',
            'enabled'   => true,
            'order'     => 1,
        ),
        'globalblocks' => array(
            'namespace' => 'Globalblocks',
            'enabled'   => true,
            'order'     => 1,
        ),
        'menus' => array(
            'namespace' => 'Menus',
            'enabled'   => true,
            'order'     => 1,
        ),
        'system' => array(
            'namespace' => 'System',
            'enabled'   => true,
            'order'     => 9001,
        ),
        'pages' => array(
            'namespace' => 'Pages',
            'enabled'   => true,
            'order'     => 9002,
        ),
    ),
);
