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

<a href="createHero.php">Create Hero Now!</a>








<?php
//function giveItem($pre, $base, $suf, $itemowner, $isequipped) {
//
//  $conn=mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");
//  $pre=mysqli_real_escape_string($conn, "$pre");
//  $base=mysqli_real_escape_string($conn, "$base");
//  $suf=mysqli_real_escape_string($conn, "$suf");
//  $itempre = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM Itemstats WHERE name = '$pre' AND slot = 'prefix'"));
//  $itembase = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM Itemstats WHERE name = '$base' AND slot != 'prefix' AND slot != 'suffix'"));
//  $itemsuf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM Itemstats WHERE name = '$suf' AND slot = 'suffix'"));
//
//  $item[slot] = $itembase[slot];
//  $item[sdam] = $itempre[sdam] + $itembase[sdam] + $itemsuf[sdam];
//  $item[pdam] = $itempre[pdam] + $itembase[pdam]+ $itemsuf[pdam];
//  $item[bdam] = $itempre[bdam] + $itembase[bdam] + $itemsuf[bdam];
//  $item[sarm] = $itempre[sarm] + $itembase[sarm] + $itemsuf[sarm];
//  $item[parm] = $itempre[parm] + $itembase[parm]+ $itemsuf[parm];
//  $item[barm] = $itempre[barm] + $itembase[barm] + $itemsuf[barm];
//  $item[hpreg] = $itempre[hpreg] + $itembase[hpreg] + $itemsuf[hpreg];
//  $item[mpreg] = $itempre[mpreg] + $itembase[mpreg] + $itemsuf[mpreg];
//  $item[des] = trim($itembase[des] . " " . $itempre[des] . " " . $itemsuf[des]);
//
//  mysqli_query($conn,"INSERT INTO Item (pre, base, suf, des, owner, slot, equip, sdam, pdam, bdam, sarm, parm, barm, hpreg, mpreg) VALUES ('$pre', '$base', '$suf', '$item[des]', '$itemowner', '$item[slot]', '$isequipped', '$item[sdam]', '$item[pdam]', '$item[bdam]', '$item[sarm]', '$item[parm]', '$item[barm]', '$item[hpreg]', '$item[mpreg]')");
//
//  mysqli_close($conn);
//
//}
?>