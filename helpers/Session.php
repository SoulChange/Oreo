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
namespace helpers;

class Session
{
    static $instance;

    public function __construc()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

      /**
     * write key on session
     * @param $key
     * @param $value
     **/
    public static function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

  /**
     * read key on session
     * @param $key
     */
    public static function read($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

  /**
     * destroy key on session
     * @param $key
     */
    public static function delete($key)
    {
        $session = explode(',', $key);
        foreach ($session as $key) {
            unset($_SESSION[$key]);
        }
    }

  /**
     * check session
     * @param $key
     */
    public static function check($key)
    {
        return isset($_SESSION[$key]);
    }
}
