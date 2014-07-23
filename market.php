<?php

// if not logged in, redirect to login page
require_once('Classes/Login.php');
if (\Classes\Login::isLoggedIn() === false) header('Location: login.php');

require_once('/Includes/common.php');
require_once('/Classes/Item.php');
require_once('/Includes/menu.php');

use \Classes\Item as Item;

$itemList = Item::getAllItems();

echo '<table><tr><th>Name</th><th>Description</th><th>Cost</th></ht><th>Slot</th><th>S. Dmg</th><th>P. Dmg</th><th>B. Dmg</th><th>S. Arm</th><th>P. Arm</th><th>B. Arm</th><th>HP Regen</th><th>MP Regen</th><th>Buy</th></tr>';

foreach ($itemList as $item) {
    // cache item values for ease of use
    $itemName = $item->getFullName();
    $itemCost = $item->getMarketValue();
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

    echo '<tr>';
    echo "<td><a href=\"loaditem.php?name=$itemName\">$itemName</a></td>";
    echo "<td>$itemDesc</td>";
    echo "<td>$itemCost</td>";
    echo "<td>$itemSlot</td>";
    echo "<td>$itemSDAM</td>";
    echo "<td>$itemPDAM</td>";
    echo "<td>$itemBDAM</td>";
    echo "<td>$itemSARM</td>";
    echo "<td>$itemPARM</td>";
    echo "<td>$itemBARM</td>";
    echo "<td>$itemHpRegen</td>";
    echo "<td>$itemMpRegen</td>";
    echo "<td><a href=\"#\">Buy</a></td>";
    echo '</tr>';
}

echo '</table>';