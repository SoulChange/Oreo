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

use DateTime;
use DateInterval;

class Date
{

    /**
   * @param mysql date
   * @return Convivial date
   **/
    public static function toAbsolute($date)
    {
        $NomJour = date("D", strtotime($date));
        $Jour = date("j", strtotime($date));
        $NomMois = date("M", strtotime($date));
        $Annee = date("Y", strtotime($date));
        switch ($NomJour) {
            case "Mon":
                $NomJour = "Lundi";
                break;
            case "Tue":
                $NomJour = "Mardi";
                break;
            case "Wed":
                $NomJour = "Mercredi";
                break;
            case "Thu":
                $NomJour = "Jeudi";
                break;
            case "Fri":
                $NomJour = "Vendredi";
                break;
            case "Sat":
                $NomJour = "Samedi";
                break;
            case "Sun":
                $NomJour = "Dimanche";
                break;
        }
        switch ($NomMois) {
            case "Jan":
                $NomMois = "Janvier";
                break;
            case "Feb":
                $NomMois = "Fevrier";
                break;
            case "Mar":
                $NomMois = "Mars";
                break;
            case "Apr":
                $NomMois = "Avril";
                break;
            case "May":
                $NomMois = "Mai";
                break;
            case "Jun":
                $NomMois = "Juin";
                break;
            case "Jul":
                $NomMois = "Juillet";
                break;
            case "Aug":
                $NomMois = "Aout";
                break;
            case "Sep":
                $NomMois = "Septembre";
                break;
            case "Oct":
                $NomMois = "Octobre";
                break;
            case "Nov":
                $NomMois = "Novembre";
                break;
            case "Dec":
                $NomMois = "Decembre";
                break;
        }
        return $NomJour." ".$Jour." ".$NomMois." ".$Annee;
    }

    public static function toRelative($date)
    {
        $date_a_comparer = new DateTime($date);
        $date_actuelle = new DateTime("now");

        $intervalle = $date_a_comparer->diff($date_actuelle);

        if ($date_a_comparer > $date_actuelle) {
            $prefixe = 'Dans ';
        } else {
            $prefixe = 'Il y\'a ';
        }

        $ans = $intervalle->format('%y');
        $mois = $intervalle->format('%m');
        $jours = $intervalle->format('%d');
        $heures = $intervalle->format('%h');
        $minutes = $intervalle->format('%i');
        $secondes = $intervalle->format('%s');

        if ($ans != 0) {
            $relative_date = $prefixe . $ans . ' an' . (($ans > 1) ? 's' : '');
            if ($mois >= 6) {
                $relative_date .= ' et demi';
            }
        } elseif ($mois != 0) {
            $relative_date = $prefixe . $mois . ' mois';
            if ($jours >= 15) {
                $relative_date .= ' et demi';
            }
        } elseif ($jours != 0) {
            $relative_date = $prefixe . $jours . ' jour' . (($jours > 1) ? 's' : '');
        } elseif ($heures != 0) {
            $relative_date = $prefixe . $heures . ' heure' . (($heures > 1) ? 's' : '');
        } elseif ($minutes != 0) {
            $relative_date = $prefixe . $minutes . ' minute' . (($minutes > 1) ? 's' : '');
        } else {
            $relative_date = $prefixe . ' quelques secondes';
        }
        return $relative_date;
    }

    public static function getNow():string
    {
        return date("Y-m-d H:i:s");
    }
    public static function getToday():string
    {
        return date("Y-m-d");
    }
    public static function getDate($date):string
    {
        return $date->format("Y-m-d");
    }
    public static function getDay($date):string
    {
        $d = new DateTime($date);
        return $d->format('d');
    }
    public static function getRelativeDay($date):string
    {
        $d = new DateTime($date);
        return $d->format('D');
    }
    public static function getMonth($date):string
    {
        $d = new DateTime($date);
        return $d->format('m');
    }
    public static function getWeeck($date):string
    {
        $d = new DateTime($date);
        return $d->format('W');
    }

    public static function getBeginOfWeeck($date = null)
    {
        if ($date == null) {
            $date = date("Y-m-d");
        }
         $d = self::getRelativeDay($date);
        switch ($d) {
            case 'Mon':
                return $date;
                break;
            case 'Tue':
                $date = new DateTime($date);
                return self::getDate($date->sub(new DateInterval('P1D')));
                break;
            case 'Wed':
                $date = new DateTime($date);
                return self::getDate($date->sub(new DateInterval('P2D')));
              break;
            case 'Thu':
                $date = new DateTime($date);
                return self::getDate($date->sub(new DateInterval('P3D')));
              break;
            case 'Fri':
                $date = new DateTime($date);
                return self::getDate($date->sub(new DateInterval('P4D')));
                break;
            case 'Sat':
                $date = new DateTime($date);
                return self::getDate($date->sub(new DateInterval('P5D')));
              break;
            case 'Sun':
                $date = new DateTime($date);
                return self::getDate($date->sub(new DateInterval('P6D')));
                break;
        }
    }
    public static function getEndOfWeeck($date = null)
    {
        if ($date == null) {
            $date = date("Y-m-d");
        }
         $d = self::getRelativeDay($date);
        switch ($d) {
            case 'Mon':
                $date = new DateTime($date);
                return self::getDate($date->add(new DateInterval('P6D')));
                break;
            case 'Tue':
                $date = new DateTime($date);
                return self::getDate($date->add(new DateInterval('P5D')));
                break;
            case 'Wed':
                $date = new DateTime($date);
                return self::getDate($date->add(new DateInterval('P4D')));
              break;
            case 'Thu':
                $date = new DateTime($date);
                return self::getDate($date->add(new DateInterval('P3D')));
              break;
            case 'Fri':
                $date = new DateTime($date);
                return self::getDate($date->add(new DateInterval('P2D')));
                break;
            case 'Sat':
                $date = new DateTime($date);
                return self::getDate($date->add(new DateInterval('P1D')));
              break;
            case 'Sun':
                return $date;
                break;
        }
    }

    public static function getYear($date):string
    {
        $d = new DateTime($date);
        return $d->format('y');
    }
}
