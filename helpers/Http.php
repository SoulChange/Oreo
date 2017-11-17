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

class Http
{

    public static function getOS()
    {
         $platform    =   "Unknown OS Platform";
         $array       =   array(
           '/windows nt 10/i'     =>  'Windows 10',
           '/windows nt 6.3/i'     =>  'Windows 8.1',
           '/windows nt 6.2/i'     =>  'Windows 8',
           '/windows nt 6.1/i'     =>  'Windows 7',
           '/windows nt 6.0/i'     =>  'Windows Vista',
           '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
           '/windows nt 5.1/i'     =>  'Windows XP',
           '/windows xp/i'         =>  'Windows XP',
           '/windows nt 5.0/i'     =>  'Windows 2000',
           '/windows me/i'         =>  'Windows ME',
           '/win98/i'              =>  'Windows 98',
           '/win95/i'              =>  'Windows 95',
           '/win16/i'              =>  'Windows 3.11',
           '/macintosh|mac os x/i' =>  'Mac OS X',
           '/mac_powerpc/i'        =>  'Mac OS 9',
           '/linux/i'              =>  'Linux',
           '/ubuntu/i'             =>  'Ubuntu',
           '/iphone/i'             =>  'iPhone',
           '/ipod/i'               =>  'iPod',
           '/ipad/i'               =>  'iPad',
           '/android/i'            =>  'Android',
           '/blackberry/i'         =>  'BlackBerry',
           '/webos/i'              =>  'Mobile'
         );
        foreach ($array as $regex => $value) {
            if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
                $platform    =   $value;
            }
        }
         return $platform;
    }



    public static function getBrowser()
    {
        $browser        =   "Unknown Browser";
        $array  =   array(
          '/msie/i'       =>  'Internet Explorer',
          '/firefox/i'    =>  'Firefox',
          '/safari/i'     =>  'Safari',
          '/chrome/i'     =>  'Chrome',
          '/edge/i'       =>  'Edge',
          '/opera/i'      =>  'Opera',
          '/netscape/i'   =>  'Netscape',
          '/maxthon/i'    =>  'Maxthon',
          '/konqueror/i'  =>  'Konqueror',
          '/mobile/i'     =>  'Handheld Browser'
        );
        foreach ($array as $regex => $value) {
            if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
                $browser    =   $value;
            }
        }
        return $browser;
    }

    public static function getIp()
    {
        return $_SERVER['REMOTE_ADDR'];
        $ip = $_SERVER['REMOTE_ADDR'];
        return $ip.', '.self::getBrowser().', '.self::getOS();
    }

    public static function getUserAgent()
    {
        return $ip.', '.self::getBrowser().', '.self::getOS();
    }

    public static function getStatut()
    {
        return    (isset($_SERVER['REDIRECT_STATUS'])) ? $_SERVER['REDIRECT_STATUS'] : 200;
    }
}
