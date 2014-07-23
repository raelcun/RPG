<?php
    require_once('/Classes/Login.php');
?>

<style>
    #menu {
        list-style: none;
        margin-bottom: 15px;
    }
    #menu li {
        float: left;
        margin-left: 10px;
    }
</style>

<ul id="menu">
    <li><?php echo \Classes\Login::getLoggedInHeroName(); ?> - </li>
    <li><a href='herolist.php'>Hero List</a></li>
    <li><a href='loadhero.php'>Load Hero</a></li>
    <li><a href='loadparty.php'>Load Party</a></li>
    <li><a href='itemlist.php'>Item List</a></li>
    <li><a href='loaditem.php'>Load Item</a></li>
    <li><a href='abilitylist.php'>Ability List</a></li>
    <li><a href='market.php'>Market</a></li>
    <li><a href='battleplan.php'>Battle Plan</a></li>
    <li><a href='messages.php'>Messages</a></li>
    <li><a href='logout.php'>Logout</a></li>
</ul>

<div style="clear: both;"></div>

<br />