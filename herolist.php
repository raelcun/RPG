<?php

require_once('/Includes/checklogin.php');
require_once('/Includes/common.php');
require_once('/Classes/Hero.php');
require_once('/Includes/menu.php');

$heroList = \Classes\Hero::getAllHeroes();

echo 'Heroes:<br />';
echo '<table border=\'1\' style=\'border-collapse:collapse;\' cellpadding=\'5\'><tr><th>Name</th><th>Race</th><th>Profession</th><th>Experience</th><th>Party</th><th>Strength</th><th>Intelligence</th><th>Dexterity</th><th>Agility</th><th>Wisdom</th><th>Perception</th><th>Action</th><th>Constitution</th><th>Charisma</th><th>Gold</th></tr>';

foreach ($heroList as $hero) {
    echo '<tr>'."\r\n";
    echo '<td><a href=\'loadhero.php?searchname='.$hero->getName().'\'>'.$hero->getName().'</a></td>'."\r\n";
    echo '<td>'.$hero->getRace().'</td>'."\r\n";
    echo '<td>'.$hero->getProfession().'</td>'."\r\n";
    echo '<td>'.$hero->getXp().'</td>'."\r\n";
    echo '<td>'.$hero->getParty().'</td>'."\r\n";
    echo '<td>'.$hero->getStrength().'</td>'."\r\n";
    echo '<td>'.$hero->getIntelligence().'</td>'."\r\n";
    echo '<td>'.$hero->getDexterity().'</td>'."\r\n";
    echo '<td>'.$hero->getAgility().'</td>'."\r\n";
    echo '<td>'.$hero->getWisdom().'</td>'."\r\n";
    echo '<td>'.$hero->getPerception().'</td>'."\r\n";
    echo '<td>'.$hero->getActions().'</td>'."\r\n";
    echo '<td>'.$hero->getConstitution().'</td>'."\r\n";
    echo '<td>'.$hero->getCharisma().'</td>'."\r\n";
    echo '<td>'.$hero->getGold().'</td>'."\r\n";
    echo '</tr>'."\r\n";
}

echo '</table>'."\r\n";