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

use core;

class App extends core\Dispatcher
{


    public static function salutation()
    {
        $date = date('H');
        if ($date <=23 && $date > 21) {
            $message = 'Bonne Nuit, ';
        } elseif ($date == 13) {
            $message = 'Bon Midi, ';
        } elseif ($date > 13 && $date < 17) {
            $message = 'Bon Apres Midi, ';
        } elseif ($date > 17 && $date < 21) {
            $message = 'Bonsoir, ';
        } else {
            $message = 'Bonjour, ';
        }
        $date = null;
        return $message;
    }
}
