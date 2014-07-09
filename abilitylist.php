<?php

include_once("Includes/checklogin.php");
include_once('Includes/common.php');

$conn=mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");

echo "Abilities:<br>";

$items = mysqli_query($conn,"SELECT * FROM Abilities");
echo "<table border='1' style='border-collapse:collapse;' cellpadding='5'><tr><th>ID</th><th>Name</th><th>Profession</th><th>Cost</th><th>Effect</th><th>Type</th><th>Range</th><th>Duration</th><th>Targets</th></tr>";

while($row = mysqli_fetch_assoc($items)) {
  echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['prof'] . "</td><td>" . $row['cost'] . "</td><td>" . $row['effect'] . "</td><td>" . $row['type'] . "</td><td>" . $row['range'] . "</td><td>" . $row['duration'] . "</td><td>" . $row['targets'] . "</td></tr>";
}
echo "</table>";

mysqli_close($conn);
?>