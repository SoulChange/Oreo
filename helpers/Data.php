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

class Data
{


  /**
     * Empty data
     * @param $data
     * @return boolean
     */

   /**
   * @function  : nom de votre fonction qui doit être court et explicatif
   * @Input : paramètre(s) en entrée entre () (ne pas trop en mettre)
   * @Output : paramètre(s) en sortie (la fonction ne peut renvoyer qu'une seule variable ou alors un tableau).
   * @Description : l'utilité de cette fonction
   * @Creator : le créateur de la fonction
   * @date : date de création
  */
    public static function empty(...$data)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                return true;
            }
        }
        return false;
    }

    public static function remove_specials_chars($subject, $replace):string
    {
        return str_replace(["/",".",":",",","'"," "], $replace, $subject);
    }

    public static function remove_specials_chars_lower($subject, $replace):string
    {
        return strtolower(self::remove_specials_chars($subject, $replace));
    }

    public static function randomNumber($length)
    {
        $numbers = "0123456789";
        return substr(str_shuffle(str_repeat($numbers, $length)), 0, $length);
    }

    public static function randomString()
    {
        $year = date('y');
        $char = self::randString(2, "ABCDEFGHJKLMNPQRSTUVWXYZ");
        $number = self::randString(5, "111222333444555666777888999");
        //$letters = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return $year.$char.$number;
    }

    public static function randString($length, $table)
    {
        return substr(str_shuffle(str_repeat($table, $length)), 0, $length);
    }
}
