<?php

require_once('/Includes/checklogin.php');
require_once('/Includes/common.php');
require_once('/Classes/Item.php');
require_once('/Includes/menu.php');

use \Classes\Item as Item;

echo '<form name="itemSearch" action="loaditem.php" method="GET">';
echo '<input type="text" name="itemName" />';
echo '<input type="submit" value="submit" />';
echo '</form>';

if (array_key_exists('itemName', $_GET)) {
    $item = Item::getItemByFullName($_GET['itemName']);
    if (is_null($item)) { echo 'Cannot find '.$_GET['itemName']; exit(0); }

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
    echo "<td>$itemName</td>\n";
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