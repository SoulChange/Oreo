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
class App extends core\Controller
{

    function __construct()
    {
        helpers\Ajax::start();
    }

    function main()
    {
        echo json_encode(app\models\App::setNotifView());
    }


    function addcat()
    {
        if (!helpers\Data::empty($_POST['title'])) {
            app\models\App::addCat($_POST['title']);
        }
    }
}
