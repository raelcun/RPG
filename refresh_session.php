<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/6/14
 * Time: 3:00 PM
 */

// make sure session is started
\Classes\Login::startSession();

// keep session alive by "changing" a value
if (array_key_exists('authenticated', $_SESSION)) $_SESSION['authenticated'] = $_SESSION['authenticated'];