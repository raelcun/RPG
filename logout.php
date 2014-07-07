<?php

include_once('Classes/Login.php');

// logout
\Classes\Login::logOut();

// redirect back to login page
header('Location: login.php');

?>