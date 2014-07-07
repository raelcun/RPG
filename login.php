<?php

include_once('Classes/Login.php');
include_once('Includes/common.php');

// if already logged in, redirect to home page
if (\Classes\Login::isLoggedIn()) {
    header('Location: home.php');
}

// if login form has been submitted
if (array_key_exists('name', $_POST) and array_key_exists('pw', $_POST)) {
    if (\Classes\Login::logIn($_POST['name'], $_POST['pw']) === false) {
        // failed to login, so alert user
        echo 'Incorrect Login';
    } else {
        // we're logged in, so redirect to home page
        header('Location: home.php');
    }
}

?>

<form action='login.php' method='post'>
    <fieldset>
        <legend>Login</legend>
        <label for="name">Name</label>
        <input type='text' id="name" name='name' required>
        <br />
        <label for="pw">Password</label>
        <input type='password' id="pw" name='pw' required>
        <br />
        <input type='submit'>
    </fieldset>
</form>