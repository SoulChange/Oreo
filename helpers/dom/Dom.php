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
namespace helpers\dom;

use core;

class Dom
{

    public static function addScript($script, $isSource = true, $integrity = null)
    {
        if ($isSource) {
                return '<script src="assets/js/'.$script.'" type="text/javascript" charset="'.strtolower(core\Config::encoding()).'"></script>'."\r\n";
        } else {
            return '<script type="text/javascript">'.$script.'</script>'."\r\n";
        }
    }

    public static function addStyle($style, $isSource = false)
    {
        if ($isSource) {
            if (file_exists($style)) {
                return '<link href="'.$style.'" rel="stylesheet" type="text/css" media="all">'."\r\n";
            }
        } else {
               return '<style type="text/css">'.$style.'</style>'."\r\n";
        }
    }
    public static function img($url, $alt = null)
    {
        if ($alt) {
            return '<img src="assets/img/'.$url.'" alt="'.$alt.'">'."\r\n";
        } else {
            return '<img src="assets/img/'.$url.'">'."\r\n";
        }
    }
    public static function link($url, $title, $external = false, $target = null)
    {
        if ($target && $external == false) {
            return '<a href="'.base_url.$url.'" target="'.$target.'" title="'.$title.'">'.$title.'</a>';
        } elseif ($target && $external != false) {
            return '<a href="'.$url.'" target="'.$target.'" title="'.$title.'">'.$title.'</a>';
        } elseif (!$target && $external == false) {
            return '<a href="'.base_url.$url.'" title="'.$title.'">'.$title.'</a>';
        } elseif (!$target && $external != false) {
            return '<a href="'.$url.'" title="'.$title.'">'.$title.'</a>';
        }
    }
}
