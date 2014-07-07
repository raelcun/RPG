<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/6/14
 * Time: 8:13 PM
 */

include_once('Classes/Login.php');
include_once('Classes/Hero.php');

// if new account form has been submitted
if (array_key_exists('name', $_POST)
    and array_key_exists('pw', $_POST)
    and array_key_exists('race', $_POST)
    and array_key_exists('prof', $_POST))
{
    if (\Classes\Hero::doesHeroExist($_POST['name']) === true) {
        echo 'Hero name already exists';
    } else {
        // validate race and profession
        if (\Classes\Hero::parseRace($_POST['race']) === false) { echo 'Invalid race'; exit(0); }
        if (\Classes\Hero::parseProfession($_POST['prof']) === false) { echo 'Invalid profession'; exit(0); }

        // try to create hero
        $hero = \Classes\Hero::createHero($_POST['name'], $_POST['pw']);
        $hero->setRace($_POST['race']);
        $hero->setProfession($_POST['prof']);

        // log in with newly created hero
        \Classes\Login::logIn($_POST['name'], $_POST['pw']);

        // redirect to home
        header('Location: home.php');
    }
}

?>

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

<form action='createHero.php' method='post'>
    <fieldset>
        <legend>New Account</legend>
        <label for="name">Name</label>
        <input type='text' name='name' id="name" required>

        <br />

        <label for="pw">Password</label>
        <input type='password' name='pw' id="pw" required>

        <br />

        <label for="race">Race</label>
        <select name='race' id="race" required onchange='changestats(this.value)'><option value='Human'>Human</option><option value='Elf'>Elf</option><option value='Orc'>Orc</option><option>Dwarf</option></select>
        <span id='racestats'>+10% HP, +10% MP</span>

        <br />

        <label for="prof">Profession</label>
        <select name='prof' id="prof" required onchange='changestats(this.value)'><option value='Barbarian'>Barbarian</option><option value='Archer'>Archer</option><option value='Mage'>Mage</option><option>Knight</option><option>Priest</option></select>
        <span id='profstats'>+30% HP, -15% MP</span>

        <br />

        <input type='submit'>
    </fieldset>
</form>