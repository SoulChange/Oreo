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
namespace app\models;

use core;
use helpers;

class App
{

    public static function getNbVisitorToday()
    {
        $date = helpers\Date::getToday();
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("SELECT count(id) FROM visiteur WHERE periode = :periode");
        $query->execute([":periode"=>$date]);
        $date = null;
        return $query->fetch();
    }
    public static function getNbVisitorWeeck()
    {
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("SELECT count(id) FROM visiteur WHERE periode BETWEEN :start AND :ends");
        $query->execute([":start"=>helpers\Date::getBeginOfWeeck(),":ends"=>helpers\Date::getEndOfWeeck()]);
        return $query->fetch();
    }
    public static function getNbVisitorTotal()
    {
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("SELECT count(id) FROM visiteur");
        $query->execute();
        return $query->fetch();
    }

    public static function addCat($title)
    {
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("INSERT INTO cat_recherches SET title = :title");
        $query->execute([":title"=>$title]);
    }

    public static function addFaq($title, $rep)
    {
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("INSERT INTO faq SET title = :title, rep = :rep");
        $query->execute([":title"=>$title, ":rep"=>$rep]);
    }

    public static function getVisitor($type = null)
    {
        if ($type != null) {
            $bdd = core\Database::pdo();
            $query = $bdd->prepare("SELECT * FROM visiteur WHERE terminal = :terminal AND periode BETWEEN :start AND :ends");
            $query->execute([":start"=>helpers\Date::getBeginOfWeeck(),":ends"=>helpers\Date::getEndOfWeeck(), ":terminal"=>$type]);
        } else {
            $bdd = core\Database::pdo();
            $query = $bdd->prepare("SELECT * FROM visiteur WHERE periode BETWEEN :start AND :ends");
            $query->execute([":start"=>helpers\Date::getBeginOfWeeck(),":ends"=>helpers\Date::getEndOfWeeck()]);
        }
        return $query->fetchAll();
    }

    public static function getcontact($type = null)
    {
            $bdd = core\Database::pdo();
            $query = $bdd->prepare("SELECT * FROM contact WHERE readed = :type");
            $query->execute([":type"=>$type]);

        return $query->fetchAll();
    }

    public static function getNbNotification()
    {
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("SELECT count(id) FROM notification WHERE statut = :periode");
        $query->execute([":periode"=>0]);
        return $query->fetch();
    }
    public static function getNbMsg()
    {
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("SELECT count(id) FROM contact WHERE readed = :periode");
        $query->execute([":periode"=>0]);
        return $query->fetch();
    }
    public static function getcat()
    {
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("SELECT * FROM cat_recherches ORDER BY created DESC");
        $query->execute();
        return $query->fetchAll();
    }

    public static function getfaq()
    {
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("SELECT * FROM faq ORDER BY created DESC");
        $query->execute();
        return $query->fetchAll();
    }

    public static function setNotifView()
    {
        $bdd = core\Database::pdo();
        $query = $bdd->prepare("UPDATE notification SET statut = :statut");
        $query->execute([":statut"=>1]);
    }
}
