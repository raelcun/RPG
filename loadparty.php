<?php

require_once('/Includes/checklogin.php');
require_once('/Includes/common.php');
require_once('/Includes/menu.php');
require_once('/Classes/Party.php');

use \Classes\Party as Party;

echo '<form name="partySearch" action="loadparty.php" method="GET">';
echo '<input type="text" name="partyName">';
echo '<input type="submit" value="Submit">';
echo '</form>';

if (array_key_exists('partyName', $_GET)) {
    $party = Party::getPartyByName($_GET['partyName']);
    if (is_null($party)) { echo 'Party '.$_GET['partyName'].' not found'; exit(); }

    // cache party values for ease of use
    $partyName = $party->getName();
    $partyCooldown = $party->getCooldown();
    $partyMemberNames = $party->getMemberNames();
    $partyApplicants = $party->getApplicants();

    echo "Party: $partyName";
    echo "Cooldown: ".$partyCooldown;
    echo "<br/>Count: ".count($partyMemberNames);
    echo "<br/>";

    echo '<table><tr><th>Hero Name</th></tr>';

    foreach ($partyMemberNames as $name) {
        echo "<tr><td><a href=\"loadhero.php?searchName=$name\">$name</a></td></tr>";
    }

    echo '</table>';
}