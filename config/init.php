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

if (version_compare(PHP_VERSION, '7.0.1', '<')) {
    throw new Exception('The Oreo Framework requires PHP version 7.0.1 or higher.');
}
  require_once 'base.php';

  require_once 'core/Autoload.php';
  /**
   * display error
   **/
switch (core\Config::getEnv()) {
    case 'dev':
        error_reporting(-1);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        break;
    case 'testing':
        break;
    case 'production':
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        break;
    default:
        header('HTTP/1.1 503 Service Unavailable.', true, 503);
        throw new Exception('The application environment is not set correctly.');
    exit(1);
}
