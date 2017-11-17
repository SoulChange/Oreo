<?php
/**
 * Welcome
 */

class Welcome extends \core\Controller
{

    function __construct()
    {
    }

    function main()
    {
            $this->render('layout/default', ["content"=>'welcome'], ["title"=>"Welcome"]);
    }
}
