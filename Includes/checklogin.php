<?php

include_once('Classes/Login.php');

// if not logged in, redirect to login page
if (\Classes\Login::isLoggedIn() === false) {
    header('Location: login.php');
}

?>