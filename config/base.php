<?php
/**
 * Oreo  : The appetite comes when eating
 * Copyright (c) SoulChange. (http://www.facebook.com/soulchange)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) SoulChange. (http://www.facebook.com/soulchange)
 * @link          http://soulchange.github.io/Oreo
 * @author        SoulChange
 * @since         1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

if (!defined("DS")) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined("ROOT")) {
    define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
}

if (!defined("HOST")) {
    if ($_SERVER['SERVER_ADDR'] != '::1'  && $_SERVER['SERVER_ADDR'] != '127.0.0.1' && $_SERVER["SERVER_NAME"] != "localhost") {
        if (isset($_SERVER['HTTP_HOST'])) {
            define('HOST', $_SERVER['HTTP_HOST'].'/');
        }
    } else {
        if (isset($_SERVER['SCRIPT_NAME'])) {
            $host = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
            define('HOST', $_SERVER['SERVER_NAME'].'/'.substr($host, 1, strlen($host)));
        }
    }
}
if (!defined("base_url")) {
    if (isset($_SERVER['HTTP_X_REMOTE_PROTO'])) {
        define('PROTOCOL', $_SERVER['HTTP_X_REMOTE_PROTO']);
        if (!defined('PROTOCOL')) {
            define('PROTOCOL', $_SERVER['HTTP_X_REMOTE_PROTO']);
        }
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
        if (!defined('PROTOCOL')) {
            define('PROTOCOL', $_SERVER['HTTP_X_FORWARDED_PROTO']);
        }
    } else {
        if (!defined('PROTOCOL')) {
            define('PROTOCOL', 'http');
        }
    }
    define('base_url', PROTOCOL."://".HOST);
}
if (!defined("CONTROLLER")) {
    define('CONTROLLER', 'app'.DS.'controllers');
}
if (!defined("CORE")) {
    define('CORE', 'core');
}
if (!defined("MODEL")) {
    define('MODEL', 'app'.DS.'models');
}
if (!defined("VIEW")) {
    define('VIEW', 'app'.DS.'views');
}
if (!defined("HELPER")) {
    define('HELPER', 'helpers');
}
if (!defined("sc_link")) {
    define('sc_link', 'https://www.soulchange.com');
}
