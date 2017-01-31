<?php
/**
 * Mailer Configuration
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

use Nova\Config\Config;


Config::set('mail', array(
    'driver' => 'mail',
    'host'   => '',
    'port'   => 587,
    'from'   => array(
        'address' => Config::get('app.email'),
        'name'    => Config::get('app.name'),
    ),
    'encryption' => 'tls',
    'username'   => '',
    'password'   => '',
    'sendmail'   => '/usr/sbin/sendmail -bs',

    // Whether or not the Mailer will pretend to send the messages.
    'pretend' => false,
));
