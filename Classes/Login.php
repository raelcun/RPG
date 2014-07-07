<?php
/**
 * User: danieltaylor
 * Date: 7/6/14
 * Time: 3:15 AM
 */

namespace Classes;

include_once('Environment.php');

class Login {

    /**
     * @return bool
     */
    public static function isLoggedIn() {
        self::startSession();
        return $_SESSION['authenticated'] === true;
    }

    public static function logOut() {
        self::startSession();
        self::setLoggedIn(false);
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public static function logIn($username, $password) {
        self::startSession();

        // create db connection
        $pdo = Environment::getDBConn();

        // execute query
        $stmt = $pdo->prepare('SELECT pw FROM Hero WHERE name = :username');
        $stmt->execute(array(':username' => $username));

        // if username is unknown, deny login attempt
        if ($stmt->rowCount() === 0) return false;

        // if password hashes match, accept login attempt
        $result = $stmt->fetch();
        $isValid = ($result['pw'] === sha1($password));
        if ($isValid) self::setLoggedIn(true);

        // close connection
        $pdo = null;

        return $isValid;
    }

    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    private static function setLoggedIn($bool) {
        self::startSession();
        $_SESSION['authenticated'] = $bool;
    }
}