<?php

include_once('Classes/Login.php');

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






<?php

//
//if(isset($_COOKIE["PHPRPG"])) {
//  $cookie = explode("||",$_COOKIE["PHPRPG"]);
//  $conn=mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");
//  $hero = mysqli_fetch_assoc(mysqli_query($conn,"SELECT pw FROM Hero WHERE name = '$cookie[0]'"));
//  mysqli_close($conn);
//  if($cookie[1] == $hero[pw]) {
//    header('Location: home.php');
//  }
//}
//
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
//
//if(isset($_POST['name'],$_POST['pw'],$_POST['race'],$_POST['prof'])) {
//  $conn=mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");
//  $name = mysqli_real_escape_string($conn, $_POST['name']);
//  $pw = sha1(mysqli_real_escape_string($conn, $_POST['pw']));
//  $race = mysqli_real_escape_string($conn, $_POST['race']);
//  $prof = mysqli_real_escape_string($conn, $_POST['prof']);
//  if(!is_null(mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Hero WHERE name = '$name'")))) {
//    echo "Hero name already exists.";
//  } else {
//    mysqli_query($conn, "INSERT INTO Hero (name, pw, race, prof) VALUES ('$name', '$pw', '$race', '$prof')");
//    mysqli_close($conn);
//    switch($prof) {
//      case "Barbarian":
//        giveItem("Rusty", "Greataxe", "", $name, 1);
//        giveItem("", "Leather Gloves", "", $name, 1);
//        giveItem("", "Leather Greaves", "", $name, 1);
//        giveItem("", "Leather Boots", "", $name, 1);
//        break;
//      case "Mage":
//        giveItem("", "Staff", "", $name, 1);
//        giveItem("", "Spellbook", "", $name, 2);
//        giveItem("", "Mage Robe", "", $name, 1);
//        break;
//      case "Archer":
//        giveItem("", "Bow", "", $name, 1);
//        giveItem("", "Leather Armor", "", $name, 1);
//        giveItem("", "Leather Gloves", "", $name, 1);
//        giveItem("", "Leather Greaves", "", $name, 1);
//        giveItem("", "Leather Boots", "", $name, 1);
//        break;
//      case "Priest":
//        giveItem("Frail", "Mace", "", $name, 1);
//        giveItem("", "Holy Symbol", "", $name, 2);
//        giveItem("", "Priest Robe", "", $name, 1);
//        break;
//      case "Knight":
//        giveItem("Rusty", "Long Sword", "", $name, 1);
//        giveItem("Weak", "Wooden Shield", "", $name, 2);
//        giveItem("", "Leather Armor", "", $name, 1);
//        giveItem("", "Leather Gloves", "", $name, 1);
//        giveItem("", "Leather Greaves", "", $name, 1);
//        giveItem("", "Leather Boots", "", $name, 1);
//      break;
//
//    }
//    setcookie("PHPRPG", $name."||".$pw, time()+60*60*24*365);
//    echo "<META http-equiv='refresh' content='0;URL=home.php'>";
//    exit();
//  }
//}
//
//if(isset($_POST['name'],$_POST['pw'])) {
//  $conn=mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");
//  $name = mysqli_real_escape_string($conn, $_POST['name']);
//  $pw = sha1(mysqli_real_escape_string($conn, $_POST['pw']));
//  if(is_null(mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Hero WHERE name = '$name' AND pw = '$pw'")))) {
//    echo "Incorrect login";
//  } else {
//    setcookie("PHPRPG", $name."||".$pw, time()+60*60*24*365);
//    echo "<META http-equiv='refresh' content='0;URL=home.php'>";
//    mysqli_close($conn);
//    exit();
//  }
//}
//


?>