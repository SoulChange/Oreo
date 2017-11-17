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

/**
 * Route
 */
class Route
{
    public static $CONTROLLER = '';
    public static $ACTION = '';
    public static $URL = '';
    public static $REQUEST = '';

    function __construct()
    {
        self::parse();
    }

    public static function parse()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        self::$URL = explode("/", $url);
        self::$REQUEST = $_SERVER['REQUEST_METHOD'];
    }

    public static function sanitizeUri()
    {
        self::parse();
        $length = count(self::$URL);
        if ($length >= 1) {
            if (isset(self::$URL[1])) {
                self::$URL[1] = str_replace("-", "", self::$URL[1]);
            }
            if (isset(self::$URL[0])) {
                self::$URL[0] = str_replace("-", "", self::$URL[0]);
            }
        }
        $length = null;
    }
}
