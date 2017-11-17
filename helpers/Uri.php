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

class Uri
{

  /**
   * @package Generate dynamic uri
   * @return string
   */
    public static function unique()
    {
        return str_shuffle(str_replace(["/",".",":",",","'"], "_", crypt(random_int(100000000, 9999999999), 'oreo'))) ;
    }

  /**
   * @package Generate dynamic uri with prefix
   * @param prefix
   * @return string
   */
    public static function dinamicUri($prefix = 'oreo')
    {
        return uniqid($prefix.'-');
    }
}
