<?php

// if not logged in, redirect to login page
require_once('Classes/Login.php');
if (\Classes\Login::isLoggedIn() === false) header('Location: login.php');

require_once('/Includes/common.php');
require_once('/Includes/menu.php');