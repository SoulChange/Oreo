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

class Oreo extends Route
{

    public static $_controller;

    public static function init()
    {
        Auth::parseError();
        self::sanitizeUri();
        self::$_controller = new Controller();
        if (empty(self::$URL[0])) {
            self::loadController(ucfirst(Config::defaultPage()));
        } else {
            if (Config::ajax()[0] == true) {
                if (self::$URL[0] == Config::ajax()[1]) {
                    if (isset(self::$URL[1])) {
                        if (isset(self::$URL[2])) {
                            self::loadAjax(self::$URL[1], self::$URL[2]);
                            exit();
                        } else {
                            self::loadAjax(self::$URL[1]);
                            exit();
                        }
                    } else {
                        self::$_controller::error("page not found");
                    }
                } else {
                    self::loadController(self::$URL[0]);
                }
            } else {
                self::loadController(self::$URL[0]);
            }
        }
        self::callMethod(self::$URL);
    }

    public static function loadController($controller)
    {
        $path = CONTROLLER.DS.ucfirst($controller).'.php';
        if (file_exists($path)) {
            require_once $path;
            self::$CONTROLLER = new $controller;
        } else {
            self::$_controller::error("page not found");
            return false;
        }
        $path = null;
    }

    public static function loadAjax($controller, $method = false)
    {
        $path = CONTROLLER.DS.Config::$ajax[1].DS.ucfirst($controller).'.php';
        if (file_exists($path)) {
            require_once $path;
            self::$CONTROLLER = new $controller;
            if ($method != false) {
                if (method_exists(self::$CONTROLLER, $method)) {
                    self::$CONTROLLER->$method();
                } else {
                    self::$_controller::error("action not found");
                    return false;
                }
            } else {
                self::$CONTROLLER->main();
            }
        } else {
            self::$_controller::error("page not found");
            return false;
        }
        $path = null;
    }

    public static function callMethod($url)
    {
        $length = count($url);
        if ($length > 1) {
            if (!method_exists(self::$CONTROLLER, $url[1])) {
                self::$_controller::error("action not found");
            }
        }

        switch ($length) {
            case 5:
                self::$CONTROLLER->{$url[1]}($url[2],$url[3],$url[2]);
                break;
            case 4:
                self::$CONTROLLER->{$url[1]}($url[2],$url[3]);
                break;
            case 3:
                self::$CONTROLLER->{$url[1]}($url[2]);
                break;
            case 2:
                self::$CONTROLLER->{$url[1]}();
                break;
            default:
                self::$CONTROLLER->main();
                break;
        }
        $length = null;
    }
}
