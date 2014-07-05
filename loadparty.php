<?php

include "checklogin.php";

echo "<form name='partysearch' action='loadparty.php' method='GET'><input type='text' name='searchname'><input type='submit' value='Submit'></form>";

if(!isset($_GET['searchname'])) { exit(); }

$conn=mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");

$searchname=mysqli_real_escape_string($conn, trim($_GET['searchname']));

$party = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM Party WHERE name = '$searchname'"));
mysqli_close($conn);

$party[hero1] = explode("|", $party[heroes])[0];
$party[hero2] = explode("|", $party[heroes])[1];
$party[hero3] = explode("|", $party[heroes])[2];
$party[hero4] = explode("|", $party[heroes])[3];
$party[hero5] = explode("|", $party[heroes])[4];
$party[hero6] = explode("|", $party[heroes])[5];

echo "<h1>$party[name]<h1>";

echo "<table border='1' style='border-collapse:collapse;' cellpadding='5'><tr><th>Cooldown</th><th>Hero 1</th><th>Hero 2</th><th>Hero 3</th><th>Hero 4</th><th>Hero 5</th><th>Hero 6</th></tr>";
echo "<tr><td>$party[cd]</td><td><a href='loadhero.php?searchname=$party[hero1]'>$party[hero1]</a></td><td><a href='loadhero.php?searchname=$party[hero2]'>$party[hero2]</a></td><td><a href='loadhero.php?searchname=$party[hero3]'>$party[hero3]</a></td><td><a href='loadhero.php?searchname=$party[hero4]'>$party[hero4]</a></td><td><a href='loadhero.php?searchname=$party[hero5]'>$party[hero5]</a></td><td><a href='loadhero.php?searchname=$party[hero6]'>$party[hero6]</a></td></tr>";
echo "</table>";

?>