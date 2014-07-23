<?php

require_once('/Includes/checklogin.php');
require_once('/Includes/common.php');
require_once('/Classes/Hero.php');
require_once('/Includes/menu.php');

use \Classes\Hero as Hero;
use \Classes\Item as Item;

if(!array_key_exists('searchName', $_GET)) { // show form if no hero has been selected to be shown
    echo "<form name='herosearch' action='loadhero.php' method='GET'><input type='text' name='searchName'><input type='submit' value='Submit'></form>";
} else { // if hero has been selected to be shown...
    $heroName = $_GET['searchName'];
    if (!Hero::doesHeroExist($heroName)) { echo "Hero does not exist!"; exit(); }

    // get hero information from the database
    $hero = Hero::getHeroByName($heroName);

    // cache hero information for ease of use
    $heroName = $hero->getName();
    $heroRace = $hero->getRace();
    $heroProf = $hero->getProfession();
    $heroXp = $hero->getXp();
    $heroParty = $hero->getParty();
    $heroStr = $hero->getStrength();
    $heroCon = $hero->getConstitution();
    $heroAgi = $hero->getAgility();
    $heroDex = $hero->getDexterity();
    $heroInt = $hero->getIntelligence();
    $heroWis = $hero->getWisdom();
    $heroCha = $hero->getCharisma();
    $heroAct = $hero->getActions();
    $heroPer = $hero->getPerception();
    $heroGold = $hero->getGold();
    $heroMaxHp = $hero->getMaxHp();
    $heroMaxMp = $hero->getMaxMp();

    // cache inventory stats
    $heroHpRegen = $hero->getInventory()->getTotalHpRegen();
    $heroMpRegen = $hero->getInventory()->getTotalMpRegen();
    $heroSDAM = $hero->getInventory()->getTotalSDAM();
    $heroPDAM = $hero->getInventory()->getTotalPDAM();
    $heroBDAM = $hero->getInventory()->getTotalBDAM();
    $heroSARM = $hero->getInventory()->getTotalSARM();
    $heroPARM = $hero->getInventory()->getTotalPARM();
    $heroBARM = $hero->getInventory()->getTotalBARM();

    // cache equipment slots
    $heroMainHand = $hero->getInventory()->where(function($item) { return $item->getItem()->getSlot() === Item::SLOT_HAND AND $item->getEquip() === 1; });
    $heroMainHandName = count($heroMainHand) === 0 ? 'None' : $heroMainHand[0]->getItem()->getFullName();

    $heroOffHand = $hero->getInventory()->where(function($item) { return $item->getItem()->getSlot() === Item::SLOT_HAND AND $item->getEquip() === 2; });
    $heroOffHandName = count($heroOffHand) === 0 ? 'None' : $heroOffHand[0]->getItem()->getFullName();

    $heroHead = $hero->getInventory()->where(function($item) { return $item->getItem()->getSlot() === Item::SLOT_HEAD; });
    $heroHeadName = count($heroHead) === 0 ? 'None' : $heroHead[0]->getItem()->getFullName();

    $heroTorso = $hero->getInventory()->where(function($item) { return $item->getItem()->getSlot() === Item::SLOT_TORSO; });
    $heroTorsoName = count($heroTorso) === 0 ? 'None' : $heroTorso[0]->getItem()->getFullName();

    $heroArms = $hero->getInventory()->where(function($item) { return $item->getItem()->getSlot() === Item::SLOT_ARMS; });
    $heroArmsName = count($heroArms) === 0 ? 'None' : $heroArms[0]->getItem()->getFullName();

    $heroLegs = $hero->getInventory()->where(function($item) { return $item->getItem()->getSlot() === Item::SLOT_LEGS; });
    $heroLegsName = count($heroLegs) === 0 ? 'None' : $heroLegs[0]->getItem()->getFullName();

    $heroFeet = $hero->getInventory()->where(function($item) { return $item->getItem()->getSlot() === Item::SLOT_FEET; });
    $heroFeetName = count($heroFeet) === 0 ? 'None' : $heroFeet[0]->getItem()->getFullName();



    echo "Hero:<br />\n";
    echo "<table><tr><th>Name</th><th>Race</th><th>Profession</th><th>Experience</th><th>Party</th><th>Strength</th><th>Intelligence</th><th>Dexterity</th><th>Agility</th><th>Wisdom</th><th>Perception</th><th>Action</th><th>Constitution</th><th>Charisma</th><th>Gold</th></tr>";
    echo "<tr>\n";
    echo "<td><a href=\"loadhero.php?searchName=$heroName\">$heroName</a></td>\n";
    echo "<td>$heroRace</td>\n";
    echo "<td>$heroProf</td>\n";
    echo "<td>$heroXp</td>\n";
    echo "<td>$heroParty</td>\n";
    echo "<td>$heroStr</td>\n";
    echo "<td>$heroInt</td>\n";
    echo "<td>$heroDex</td>\n";
    echo "<td>$heroAgi</td>\n";
    echo "<td>$heroWis</td>\n";
    echo "<td>$heroPer</td>\n";
    echo "<td>$heroAct</td>\n";
    echo "<td>$heroCon</td>\n";
    echo "<td>$heroCha</td>\n";
    echo "<td>$heroGold</td>\n";
    echo "</td>\n";
    echo "</table>\n";

    echo "<br><a href='sendmessage.php?to=$heroName' target='_blank'>Send a message</a><br>\n";
    echo "<br/>HP: $heroMaxHp\n";
    echo "<br/>MP: $heroMaxMp\n";
    echo "<br/>HP Regen: $heroHpRegen\n";
    echo "<br/>MP Regen: $heroMpRegen\n";
    echo "<br>\n";

    echo "<br/>Slashing damage: $heroSDAM\n";
    echo "<br/>Piercing damage: $heroPDAM\n";
    echo "<br/>Bludgeoning damage: $heroBDAM\n";
    echo "<br/><br/>\n";
    echo "<br/>Slashing armor: $heroSARM\n";
    echo "<br/>Piercing armor: $heroPARM\n";
    echo "<br/>Bludgeoning armor: $heroBARM\n";

    echo "<br/>Items:<br/>\n";
    echo "<br/>Main Hand: $heroMainHandName\n";
    echo "<br/>Off Hand: $heroOffHandName\n";
    echo "<br/>Head: $heroHeadName\n";
    echo "<br/>Torso: $heroTorsoName\n";
    echo "<br/>Arms: $heroArmsName\n";
    echo "<br/>Legs: $heroLegsName\n";
    echo "<br/>Feet: $heroFeetName\n";
}