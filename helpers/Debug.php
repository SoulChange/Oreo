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

function var_die($value = '')
{
    die(var_dump($value));
}

class Debug
{

  /**
   * @package DebudHelper
   * @param array
   * @return array
   */
    public static function var_die($value = '')
    {
        die(var_dump($value));
    }
}
