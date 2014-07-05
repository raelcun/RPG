<?php

include "checklogin.php";

echo "<form name='herosearch' action='loadhero.php' method='GET'><input type='text' name='searchname'><input type='submit' value='Submit'></form>";

if(!isset($_GET['searchname'])) { exit(); }

$conn=mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");
$searchname=mysqli_real_escape_string($conn, $_GET['searchname']);
$hero = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM Hero WHERE name = '$searchname'"));

echo "Hero:<br>";

echo "<table border='1' style='border-collapse:collapse;' cellpadding='5'><tr><th>Name</th><th>Race</th><th>Profession</th><th>Experience</th><th>Party</th><th>Strength</th><th>Intelligence</th><th>Dexterity</th><th>Agility</th><th>Wisdom</th><th>Perception</th><th>Action</th><th>Constitution</th><th>Charisma</th><th>Gold</th></tr>";
echo "<tr><td><a href='loadhero.php?searchname=$hero[name]'>$hero[name]</a></td><td>$hero[race]</td><td>$hero[prof]</td><td>$hero[xp]</td><td><a href='loadparty.php?searchname=$hero[party]'>$hero[party]</a></td><td>$hero[str]</td><td>$hero[int]</td><td>$hero[dex]</td><td>$hero[agi]</td><td>$hero[wis]</td><td>$hero[per]</td><td>$hero[act]</td><td>$hero[con]</td><td>$hero[cha]</td><td>$hero[gold]</td></tr>";
echo "</table>";

$hpmult = 1;
$mpmult = 1;

switch($hero[race]) {
  case "Elf":
    $hpmult = $hpmult - 0.15;
    $mpmult = $mpmult + 0.3;
    break;
  case "Orc":
    $hpmult = $hpmult + 0.3;
    $mpmult = $mpmult - 0.15;
    break;
  case "Human":
    $hpmult = $hpmult + 0.1;
    $mpmult = $mpmult + 0.1;
    break;
}

switch($hero[prof]) {
  case "Mage":
    $hpmult = $hpmult - 0.15;
    $mpmult = $mpmult + 0.3;
    break;
  case "Warrior":
    $hpmult = $hpmult + 0.3;
    $mpmult = $mpmult - 0.15;
    break;
  case "Archer":
    $hpmult = $hpmult + 0.1;
    $mpmult = $mpmult + 0.1;
    break;
}

function getEquips($col,$hero) {
  $conn = mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");
  return mysqli_fetch_assoc(mysqli_query($conn,"SELECT $col FROM Item WHERE equip > 0 AND owner = '$hero'"))[$col];
  mysqli_close($conn);
}

echo "<br>";
echo "<a href='sendmessage.php?to=$searchname' target='_blank'>Send a message</a><br>";
echo "<br>";
echo "HP: " . floor((5*$hero[con]+3*$hero[str])*$hpmult);
echo "<br>";
echo "MP: " . floor((5*$hero[int]+3*$hero[wis])*$mpmult);
echo "<br>";
echo "HP Regen: " . getEquips("SUM(hpreg)", $searchname);
echo "<br>";
echo "MP Regen: " . getEquips("SUM(mpreg)", $searchname);
echo "<br><br>";

//echo ": " . array_sum(array_map(function($temp){return $temp[];},$gear)) . "<br>";
echo "Slashing damage: " . getEquips("SUM(sdam)",$searchname) . "<br>";
echo "Piercing damage: " . getEquips("SUM(pdam)",$searchname) . "<br>";
echo "Bludgeoning damage: " . getEquips("SUM(bdam)",$searchname) . "<br>";
echo "<br>";
echo "Slashing armor: " . getEquips("SUM(sarm)",$searchname) . "<br>";
echo "Piercing armor: " . getEquips("SUM(parm)",$searchname) . "<br>";
echo "Bludgeoning armor: " . getEquips("SUM(barm)",$searchname) . "<br>";

echo "<br>Items:<br>";
echo "Main Hand: " . trim(mysqli_fetch_assoc(mysqli_query($conn,"SELECT CONCAT(pre, ' ', base, ' ', suf) as name FROM Item WHERE equip = 1 AND slot = 'hand' AND owner = '$searchname'"))[name]) . "<br>";
echo "Off Hand: " . trim(mysqli_fetch_assoc(mysqli_query($conn,"SELECT CONCAT(pre, ' ', base, ' ', suf) as name FROM Item WHERE equip = 2 AND slot = 'hand' AND owner = '$searchname'"))[name]) . "<br>";
echo "Head: " . trim(mysqli_fetch_assoc(mysqli_query($conn,"SELECT CONCAT(pre, ' ', base, ' ', suf) as name FROM Item WHERE equip = 1 AND slot = 'head' AND owner = '$searchname'"))[name]) . "<br>";
echo "Torso: " . trim(mysqli_fetch_assoc(mysqli_query($conn,"SELECT CONCAT(pre, ' ', base, ' ', suf) as name FROM Item WHERE equip = 1 AND slot = 'torso' AND owner = '$searchname'"))[name]) . "<br>";
echo "Arms: " . trim(mysqli_fetch_assoc(mysqli_query($conn,"SELECT CONCAT(pre, ' ', base, ' ', suf) as name FROM Item WHERE equip = 1 AND slot = 'arms' AND owner = '$searchname'"))[name]) . "<br>";
echo "Legs: " . trim(mysqli_fetch_assoc(mysqli_query($conn,"SELECT CONCAT(pre, ' ', base, ' ', suf) as name FROM Item WHERE equip = 1 AND slot = 'legs' AND owner = '$searchname'"))[name]) . "<br>";
echo "Feet: " . trim(mysqli_fetch_assoc(mysqli_query($conn,"SELECT CONCAT(pre, ' ', base, ' ', suf) as name FROM Item WHERE equip = 1 AND slot = 'feet' AND owner = '$searchname'"))[name]);

mysqli_close($conn);

?>