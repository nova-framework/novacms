<?php
/**
 * Bootstrap - the Application's specific Bootstrap.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

function pr($data, $exit = true) {
    echo '<pre>'; print_r($data); echo '</pre>';
    if ($exit == true) {
        exit();
    }
}
