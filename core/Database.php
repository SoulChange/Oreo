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

use PDO;

class Database
{

    public static $instance;

    public static function pdo()
    {
        if (!empty(self::$instance)) {
            return self::$instance;
        } else {
            try {
                self::$instance = new PDO(Config::$db['type'].':host='.Config::$db['hostname'].';dbname='.Config::$db['database'].';charset='.Config::$db['charset'].';', Config::$db['username'], Config::$db['password']);
                if (Config::$enviroment == "dev") {
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                }
                return self::$instance;
            } catch (Exception $e) {
                $controller = new Controller();
                $controller->render('layout/default', ["content"=>'error/database'], ["title"=>"Database error","error"=>$e->getMessage()]);
                exit(0);
            }
        }
    }

    public function lastInsertId()
    {
        return self::$instance->lastInsertId();
    }
}
