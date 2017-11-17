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

class Controller
{

    public function render($layout, $views = null, $vars = null)
    {
        if (isset($vars)) {
            extract($vars);
        }
        header('Content-Type: text/html; charset=utf-8');
        header('Generator: Make with Oreo v'.VERSION.'; Powered By SoulChange');
        foreach ($views as $view => $content) {
            if (is_array($views)) {
                extract($views);
            }
            ob_start();
            $file = VIEW.DS.strtolower($content).'.php';
            if (file_exists($file)) {
                include_once $file;
            } else {
                die("Le fichier ".$file." est inexistant");
            }
            include_once VIEW.DS.strtolower($content).'.php';
            ${$view} = ob_get_clean();
        }
        require_once VIEW.DS.strtolower($layout).'.otpl';
        $file = null;
    }

    public static function error($type = null)
    {
        $controller = new Controller();
        switch ($type) {
            case 'action not found':
                // $file = "core/log.oreo";
                // $handle = fopen($file, "a+");
                // if (is_readable($handle)) {
                //     $somecontent = 'Error 405 : time => '.date('l jS \of F Y h:i:s A')."\n";
                //     if (fwrite($handle, $somecontent) === false) {
                //         echo "impossible de lire dans le fichier core/log.oreo";
                //         exit;
                //     }
                //     $somecontent = null;
                //     fclose($handle);
                // }
                header("HTTP/1.1 405 Method Not Allowed");
                $controller->render("layout/default", ['content'=>"error/error404"], ["title"=>"action not found"]);
                exit();
            break;
            case 'page not found':
                // $file = "core/log.oreo";
                //
                // $handle = fopen($file, "a+");
                // if (is_readable($handle)) {
                //     $somecontent = 'Error 404 : time => '.date('l jS \of F Y h:i:s A')."\n";
                //     if (fwrite($handle, $somecontent) === false) {
                //         echo "impossible de lire dans le fichier core/log.oreo";
                //         exit;
                //     }
                //     $somecontent = null;
                //     fclose($handle);
                // }
                header("HTTP/1.1 404 Page not found");
                $controller->render("layout/default", ['content'=>"error/error404"], ["title"=>"Page not found"]);
                exit();
            break;
            default:
                header("HTTP/1.1 404 Page not found");
                $controller->render("layout/default", ['content'=>"error/error404"], ["title"=>"Page not found"]);
                exit();
            break;
        }
        $controller = null;
    }
}
