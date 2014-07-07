<?php

include_once("Includes/checklogin.php");
include_once('Includes/common.php');

$conn=mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");
$heroes = mysqli_query($conn,"SELECT * FROM Hero");

echo "Heroes:<br>";

echo "<table border='1' style='border-collapse:collapse;' cellpadding='5'><tr><th>Name</th><th>Password</th><th>Race</th><th>Profession</th><th>Experience</th><th>Party</th><th>Strength</th><th>Intelligence</th><th>Dexterity</th><th>Agility</th><th>Wisdom</th><th>Perception</th><th>Action</th><th>Constitution</th><th>Charisma</th></tr>";
while($row = mysqli_fetch_assoc($heroes)) {
  echo "<tr><td><a href='loadhero.php?searchname=" . $row['name'] . "'>" . $row['name'] . "</a></td><td>" . $row['pw'] . "</td><td>" . $row['race'] . "</td><td>" . $row['prof'] . "</td><td>" . $row['xp'] . "</td><td><a href='loadparty.php?searchname=" . $row['party'] . "'>" . $row['party'] . "</a></td><td>" . $row['str'] . "</td><td>" . $row['int'] . "</td><td>" . $row['dex'] . "</td><td>" . $row['agi'] . "</td><td>" . $row['wis'] . "</td><td>" . $row['per'] . "</td><td>" . $row['act'] . "</td><td>" . $row['con'] . "</td><td>" .  $row['cha'] . "</td></tr>";
}
echo "</table>";

mysqli_close($conn);
?>