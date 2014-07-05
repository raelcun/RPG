<?php

if(isset($_COOKIE["PHPRPG"])) {
  $cookie = explode("||",$_COOKIE["PHPRPG"]);
  $conn=mysqli_connect("ucfsh.ucfilespace.uc.edu","piattjd","curtis1","piattjd");
  $hero = mysqli_fetch_assoc(mysqli_query($conn,"SELECT pw FROM Hero WHERE name = '$cookie[0]'"));
  if($cookie[1] == $hero[pw]) {
    echo "<a href='home.php'>$cookie[0]</a> - ";
    echo "<a href='herolist.php'>Hero List</a> - ";
    echo "<a href='loadhero.php'>Load Hero</a> - ";
    echo "<a href='loadparty.php'>Load Party</a> - ";
    echo "<a href='itemlist.php'>Item List</a> - ";
    echo "<a href='loaditem.php'>Load Item</a> - ";
    echo "<a href='market.php'>Market</a> - ";
    echo "<a href='battleplan.php'>Battle Plan</a> - ";
    if(!is_null(mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM Messages WHERE receiver = '$cookie[0]' AND unread = 1")))) { echo "<a href='messages.php'>NEW MESSAGES</a> - "; } else { echo "<a href='messages.php'>Messages</a> - "; };
    echo "<a href='logout.php'>Logout</a><br>";
    echo "<br>";
    mysqli_close($conn);
    return;
  }
}
else {
  mysqli_close($conn);
  header('Location: login.php');
}
?>