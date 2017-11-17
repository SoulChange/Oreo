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

use helpers;

class Auth
{

    public static function parseError()
    {
        $controller = new Controller();
        switch (helpers\Http::getStatut()) {
            case '403':
                header("HTTP/1.1 403 Forbidden");
                $controller->render("layout/default", ['content'=>"error/403"], ["title"=>"Forbiden"]);
                exit();
            break;
            case '404':
                header("HTTP/1.1 404 Page Not Found");
                $controller->render("layout/default", ['content'=>"error/404"], ["title"=>"Page Not Found"]);
                exit();
              break;
            default:
                break;
        }

        $controller = null;
    }
}
