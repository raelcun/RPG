<script>
function changestats(change) {
  if(change == "Elf") { document.getElementById("racestats").innerHTML = "-15% HP, +30% MP"; }
  if(change == "Orc") { document.getElementById("racestats").innerHTML = "+20% HP, -10% MP"; }
  if(change == "Human") { document.getElementById("racestats").innerHTML = "+10% HP, +10% MP"; }
  if(change == "Dwarf") { document.getElementById("racestats").innerHTML = "+30% HP, -15% MP"; }
  if(change == "Mage") { document.getElementById("profstats").innerHTML = "-15% HP, +30% MP"; }
  if(change == "Barbarian") { document.getElementById("profstats").innerHTML = "+30% HP, -15% MP"; }
  if(change == "Archer") { document.getElementById("profstats").innerHTML = "+10% HP, +10% MP"; }
  if(change == "Knight") { document.getElementById("profstats").innerHTML = "+20% HP, -5% MP"; }
  if(change == "Priest") { document.getElementById("profstats").innerHTML = "-5% HP, +20% MP"; }
}
</script>

<?php

include_once('Classes/Login.php');
include_once('Includes/common.php');

// if already logged in, redirect to home page
if (\Classes\Login::isLoggedIn()) {
    header('Location: home.php');
  }
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