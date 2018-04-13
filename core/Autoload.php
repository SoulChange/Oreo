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
 /**
  * Register the autoloader for the application classes.
  *
  * @param string $class .
  *
  * @return void
  */
if (!defined("VERSION")) {
    define('VERSION', "1.0-dev");
}
  spl_autoload_register(function ($class) {
    $file = str_replace('\\', DS, $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
  });


//
// class Autoload
// {
//
//   function __construct()
//   {
//     # code...
//   }
//
//   function __construct()
//   {
//     spl_autoload_register(function($class){
//
//       /*$relativeClass = str_replace('\\','',substr($class,strrpos($class, '\\'),strlen($class)));
//       $prefix = str_replace('\\','/',substr($class,0,strrpos($class, '\\')));
//
//       $file = $prefix.substr($class,strrpos($class, '\\'),strlen($class)).'.php';
//       $file = str_replace('\\','/',strtolower($file));
//       if (file_exists($file)){
//           require $file;
//       }
// */
//       $classes = [
//         MODEL
//       ];
//
//       foreach ($classes as $dir) {
//         $classes = [
//         MODEL
//       ];
//
//       foreach ($classes as $dir) {
//         $file = $dir.DS.$class.'.php';
//         if (file_exists($file) && is_file($file)) {
//           require $file;
//         }else {
//           echo "Can't load this class : <span style='color:red'>".$class."</span>";die;
//         }
//       }
//       }
//
//     });
//   }
// }
