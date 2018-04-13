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
namespace core;

class Config
{
  /* database config*/

    private static $config;

    public static $db = [
    'dsn'   => '',
    'type'  => 'mysql',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'orphelia',
    'database' => 'cabinetkrakamte',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => false,
    'cache_on' => false,
    'cachedir' => '',
    'charset' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => false,
    'compress' => false,
    'stricton' => false,
    'failover' => array(),
    'save_queries' => true
    ];

    public static function getPackageFolder()
    {
        return self::package()[2];
    }
    public static function getPackageController()
    {
        return self::package()[1];
    }

    public static function getEnv()
    {
        $config = include "config/app.php";
        if (isset($config['environment'])) {
            return $config['environment'];
        }
    }

    public static function appName()
    {
        $config = include "config/app.php";
        if (isset($config['appname'])) {
            return $config['appname'];
        }
        echo "string";
    }

    public static function coreLanguage()
    {
        $config = include "config/app.php";
        if (isset($config['core_language'])) {
            return $config['core_language'];
        }
    }

    public static function defaultLanguage()
    {
        $config = include "config/app.php";
        if (isset($config['defaultlanguage'])) {
            return $config['defaultlanguage'];
        }
    }

    public static function encoding()
    {
        $config = include "config/app.php";
        if (isset($config['encoding'])) {
            return $config['encoding'];
        }
    }

    public static function defaultPage()
    {
        $config = include "config/app.php";
        if (isset($config['default_page'])) {
            return $config['default_page'];
        }
    }

    public static function package()
    {
        $config = include "config/app.php";
        if (isset($config['package'])) {
            return $config['package'];
        }
    }

    public static function ajax()
    {
        $config = include "config/app.php";
        if (isset($config['ajax'])) {
            return $config['ajax'];
        }
    }

    public static function database()
    {
        $config = include "config/app.php";
        if (isset($config['database'])) {
            return $config['database'];
        }
    }
}
