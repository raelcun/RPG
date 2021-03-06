<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/6/14
 * Time: 2:15 AM
 */

namespace Classes;

class Environment {
    const MODE_DET_DEV = 1; // Development
    const MODE_PROD = 2; // Production

    private static $mode;

    public static function setMode($newMode) { self::$mode = $newMode; }
    public static function isDevMode() { return self::$mode === self::MODE_DET_DEV; }
    public static function isProdMode() { return self::$mode === self::MODE_PROD; }
    public static function getMode() { return self::$mode; }

    /**
     * @return string
     */
    public static function getDBHost() {
        switch(self::$mode) {
            case self::MODE_PROD:
                return "ucfsh.ucfilespace.uc.edu";
            case self::MODE_DET_DEV:
            default:
                return "localhost";
        }
    }

    /**
     * @return string
     */
    public static function getDBUsername() {
        switch(self::$mode) {
            case self::MODE_PROD:
                return "piattjd";
            case self::MODE_DET_DEV:
            default:
                return "root";
        }
    }

    /**
     * @return string
     */
    public static function getDBPassword() {
        switch(self::$mode) {
            case self::MODE_PROD:
                return "curtis1";
            case self::MODE_DET_DEV:
            default:
                return "";
        }
    }

    /**
     * @return string Default database to connect to
     */
    public static function getDBDefault() {
        switch(self::$mode) {
            case self::MODE_PROD:
                return "piattjd";
            case self::MODE_DET_DEV:
            default:
                return "rpg";
        }
    }

    /**
     * @return \PDO
     */
    public static function getDBConn() {
        $dbHost = self::getDBHost();
        $dbDefault = self::getDBDefault();
        return new \PDO("mysql:host=$dbHost;dbname=$dbDefault", self::getDBUsername(), self::getDBPassword(), array(\PDO::ATTR_TIMEOUT => "10",\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
    }
} 