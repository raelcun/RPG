<?php

// if not logged in, redirect to login page
require_once('Classes/Login.php');
if (\Classes\Login::isLoggedIn() === false) header('Location: login.php');

require_once('/Includes/common.php');
require_once('/Classes/Item.php');
require_once('/Includes/menu.php');

use \Classes\Item as Item;

echo '<form name="itemSearch" action="loaditem.php" method="GET">';
echo '<input type="text" name="name" />';
echo '<input type="submit" value="submit" />';
echo '</form>';

if (array_key_exists('name', $_GET)) {
    $item = Item::getItemByFullName($_GET['name']);
    if (is_null($item)) { echo 'Cannot find '.$_GET['name']; exit(0); }

    // cache item values for ease of use
    $itemName = $item->getFullName();
    $itemSlot = $item->getSlot();
    $itemSDAM = $item->getSDAM();
    $itemPDAM = $item->getPDAM();
    $itemBDAM = $item->getBDAM();
    $itemSARM = $item->getSARM();
    $itemPARM = $item->getPARM();
    $itemBARM = $item->getBARM();
    $itemHpRegen = $item->getHpRegen();
    $itemMpRegen = $item->getMpRegen();
    $itemDesc = $item->getDescription();

    echo "<br/>Item:\n";
    echo "<table><tr><th>Name</th><th>Slot</th><th>Description</th><th>S. Dmg</th><th>P. Dmg</th><th>B. Dmg</th><th>S. Arm</th><th>P. Arm</th><th>B. Arm</th><th>HP Regen</th><th>MP Regen</th></tr>\n";
    echo "<tr>\n";
    echo "<td><a href=\"loaditem.php?name=$itemName\">$itemName</a></td>\n";
    echo "<td>$itemSlot</td>\n";
    echo "<td>$itemDesc</td>\n";
    echo "<td>$itemSDAM</td>\n";
    echo "<td>$itemPDAM</td>\n";
    echo "<td>$itemBDAM</td>\n";
    echo "<td>$itemSARM</td>\n";
    echo "<td>$itemPARM</td>\n";
    echo "<td>$itemBARM</td>\n";
    echo "<td>$itemHpRegen</td>\n";
    echo "<td>$itemMpRegen</td>\n";
    echo "</tr>\n";
    echo "</table>\n";
}