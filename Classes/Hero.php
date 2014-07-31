<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/6/14
 * Time: 4:20 PM
 */

namespace Classes;

include_once('Environment.php');
include_once('Item.php');
include_once('Inventory.php');
include_once('InventoryItem.php');
include_once('HeroSkills.php');
include_once('Skill.php');

class Hero {

    // race constants
    const RACE_HUMAN = 'HUMAN';
    const RACE_ELF = 'ELF';
    const RACE_ORC = 'ORC';
    const RACE_DWARF = 'DWARF';

    // profession constants
    const PROF_BARBARIAN = 'BARBARIAN';
    const PROF_ARCHER = 'ARCHER';
    const PROF_MAGE = 'MAGE';
    const PROF_KNIGHT = 'KNIGHT';
    const PROF_PRIEST = 'PRIEST';

    private $id;
    private $name;
    private $race;
    private $prof;
    private $xp;
    private $party;
    private $str;
    private $con;
    private $agi;
    private $dex;
    private $int;
    private $wis;
    private $cha;
    private $act;
    private $per;
    private $gold;
    //private $battleplan;
    private $inventory; // instance of Inventory
    private $skills; // instance of HeroSkills

    /**
     * Parameterless constructor for internally creating Heroes
     */
    private function __construct() {
        $this->inventory = new Inventory();
        $this->skills = new HeroSkills();
    }

    // get basic data
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getRace() { return $this->race; }
    public function getProfession() { return $this->prof; }
    public function getXp() { return $this->xp; }
    public function getParty() { return $this->party; }
    public function getGold() { return $this->gold; }
    public function getInventory() { return $this->inventory; }
    public function getSkills() { return $this->skills; }

    // get base stats
    public function getBaseStrength() { return $this->str; }
    public function getBaseConstitution() { return $this->con; }
    public function getBaseAgility() { return $this->agi; }
    public function getBaseDexterity() { return $this->dex; }
    public function getBaseIntelligence() { return $this->int; }
    public function getBaseWisdom() { return $this->wis; }
    public function getBaseCharisma() { return $this->cha; }
    public function getBaseActions() { return $this->act; }
    public function getBasePerception() { return $this->per; }

    // get stats adjusted for items
    public function getStrength() { return $this->str; }
    public function getConstitution() { return $this->con; }
    public function getAgility() { return $this->agi; }
    public function getDexterity() { return $this->dex; }
    public function getIntelligence() { return $this->int; }
    public function getWisdom() { return $this->wis; }
    public function getCharisma() { return $this->cha; }
    public function getActions() { return $this->act; }
    public function getPerception() { return $this->per; }

    public function getSDAM() {
        return array_sum(array_map(function ($inventoryItem) { return $inventoryItem->getItem()->getSDAM(); }, $this->inventory->getEquippedItems()));
    }

    public function getPDAM() {
        return array_sum(array_map(function ($inventoryItem) { return $inventoryItem->getItem()->getPDAM(); }, $this->inventory->getEquippedItems()));
    }

    public function getBDAM() {
        return array_sum(array_map(function ($inventoryItem) { return $inventoryItem->getItem()->getBDAM(); }, $this->inventory->getEquippedItems()));
    }

    public function getSARM() {
        return array_sum(array_map(function ($inventoryItem) { return $inventoryItem->getItem()->getSARM(); }, $this->inventory->getEquippedItems()));
    }

    public function getPARM() {
        return array_sum(array_map(function ($inventoryItem) { return $inventoryItem->getItem()->getPARM(); }, $this->inventory->getEquippedItems()));
    }

    public function getBARM() {
        return array_sum(array_map(function ($inventoryItem) { return $inventoryItem->getItem()->getBARM(); }, $this->inventory->getEquippedItems()));
    }

    //public function getBattleplan() { return $this->battleplan; } // TODO: implement Battleplan object and enable this function


    public function getMaxHp() {
        $hpMult = 1;

        if ($this->race === self::RACE_ELF) $hpMult -= 0.15;
        elseif ($this->race === self::RACE_ORC) $hpMult += 0.2;
        elseif ($this->race === self::RACE_HUMAN) $hpMult += 0.1;
        elseif ($this->race === self::RACE_DWARF) $hpMult += 0.3;

        if ($this->prof === self::PROF_MAGE) $hpMult -= 0.15;
        elseif ($this->prof === self::PROF_BARBARIAN) $hpMult += 0.3;
        elseif ($this->prof === self::PROF_ARCHER) $hpMult += 0.1;
        elseif ($this->prof === self::PROF_KNIGHT) $hpMult += 0.2;
        elseif ($this->prof === self::PROF_PRIEST) $hpMult -= 0.05;

        return floor((5*$this->con + 3*$this->str)*$hpMult);
    }

    public function getMaxMp() {
        $mpMult = 1;

        if ($this->race === self::RACE_ELF) $mpMult += 0.3;
        elseif ($this->race === self::RACE_ORC) $mpMult -= 0.1;
        elseif ($this->race === self::RACE_HUMAN) $mpMult += 0.1;
        elseif ($this->race === self::RACE_DWARF) $mpMult += 0.15;

        if ($this->prof === self::PROF_MAGE) $mpMult += 0.3;
        elseif ($this->prof === self::PROF_BARBARIAN) $mpMult -= 0.15;
        elseif ($this->prof === self::PROF_ARCHER) $mpMult += 0.1;
        elseif ($this->prof === self::PROF_KNIGHT) $mpMult -= 0.05;
        elseif ($this->prof === self::PROF_PRIEST) $mpMult += 0.2;

        return floor((5*$this->int + 3*$this->wis)*$mpMult);
    }

    public function increaseXp($amount) {
        if (!is_numeric($amount)) return false;
        if (!self::updateDBAttribute('xp', $this->xp + $amount, \PDO::PARAM_INT)) return false;
        $this->xp += $amount;
        return true;
    }

    public function joinParty($partyName) {
        if (!is_string($partyName)) return false;
        if (!self::updateDBAttribute('partyName', $partyName, \PDO::PARAM_STR)) return false;
        $this->party = $partyName;
        return true;
    }

    public function increaseGold($amount) {
        if (!is_numeric($amount)) return false;
        if (!self::updateDBAttribute('gold', $this->gold + $amount, \PDO::PARAM_INT)) return false;
        $this->gold += $amount;
        return true;
    }

    public function receiveItem($itemName, $equip = 0) {
        if (is_null($this->inventory)) $this->inventory = array();
        $item = Item::getItemByFullName($itemName);
        if (is_null($item)) return false;

        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('INSERT INTO inventory (item, owner, equip) VALUES (:itemId, :ownerId, :equip)');
        $stmt->bindValue(':itemId', $item->getId(), \PDO::PARAM_INT);
        $stmt->bindValue(':ownerId', $this->getId(), \PDO::PARAM_INT);
        $stmt->bindValue(':equip', $equip, \PDO::PARAM_INT);
        if ($stmt->execute() === false) return false;

        return $this->inventory->append($item);
    }

    public function unequipInventoryItem($inventoryItem) {
        return $inventoryItem->setEquip(0);
    }

    public function equipInventoryItem($inventoryItem) {
        return $inventoryItem->setEquip(1);
    }

    public function dropInventoryItem($inventoryItem) {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('DELETE FROM inventory WHERE id = :id');
        $stmt->bindValue(':id', $inventoryItem->getId(), \PDO::PARAM_INT);
        if ($stmt->execute() === false) return false; // failed to remove item

        return $this->inventory->remove($inventoryItem);
    }

    public static function getHeroByName($name) {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('SELECT * FROM hero WHERE name = :name');
        $stmt->execute(array(':name' => $name));
        if ($stmt->rowCount() === 0) return false;
        $result = $stmt->fetch();
        $pdo = null; // close connection

        return self::loadHeroFromArray($result);
    }

    public static function getAllHeroes() {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('SELECT * FROM hero');
        $stmt->execute();
        $result = $stmt->fetchAll();

        $heroList = array();
        foreach ($result as $row) {
            array_push($heroList, self::loadHeroFromArray($row));
        }

        return $heroList;
    }

    public static function doesHeroExist($name) {
        $pdo = Environment::getDBConn();

        $stmt = $pdo->prepare('SELECT * FROM hero WHERE name = :name');
        $stmt->execute(array(':name' => $name));
        return $stmt->rowCount() >= 1;
    }

    public static function createHero($name, $password, $race, $prof) {
        if (self::doesHeroExist($name)) return false;

        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('INSERT INTO hero (name, pw, race, prof) VALUES (:name, :pw, :race, :prof)');
        $result = $stmt->execute(array(':name' => $name, ':pw' => sha1($password), ':race' => $race, ':prof' => $prof));
        $pdo = null;

        if ($result) {
            $hero = self::getHeroByName($name);

            switch($prof) {
                default:
                    $hero->receiveItem("Dagger");
                    $hero->receiveItem("Leather Greaves");
                    $hero->receiveItem("Leather Gloves");
                    $hero->receiveItem("Leather Armor");
                    $hero->receiveItem("Leather Boots");
                    break;
            }
        }

        return false;
    }

    public static function deleteHero($name) {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('DELETE FROM hero WHERE name = :name');
        $pdo = null;
        return $stmt->execute(array(':name' => $name));

        // TODO: must delete inventory as well
    }

    private static function loadHeroFromArray($arr) {
        $hero = new Hero();
        $hero->id = (int)$arr['id'];
        $hero->name = $arr['name'];
        $hero->race = $arr['race'];
        $hero->prof = $arr['prof'];
        $hero->xp = (int)$arr['xp'];
        $hero->party = $arr['party'];
        $hero->str = (int)$arr['str'];
        $hero->con = (int)$arr['con'];
        $hero->agi = (int)$arr['agi'];
        $hero->dex = (int)$arr['dex'];
        $hero->int = (int)$arr['int'];
        $hero->wis = (int)$arr['wis'];
        $hero->cha = (int)$arr['cha'];
        $hero->act = (int)$arr['act'];
        $hero->per = (int)$arr['per'];
        $hero->gold = (int)$arr['gold'];

        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('
            SELECT inv.id AS inventoryId,inv.equip AS equip,item.*
            FROM inventory AS inv
            INNER JOIN items AS item ON inv.item = item.id
            WHERE owner = :owner');
        $stmt->execute(array(':owner' => $hero->id));
        $result = $stmt->fetchAll();
        foreach ($result as $elem) {
            $hero->inventory->append(InventoryItem::loadInventoryItemFromArray($elem, array('id' => $elem['inventoryId'], 'equip' => $elem['equip'])));
        }

        $stmt = $pdo->prepare('
            SELECT sl.*
            FROM heroSkills AS hs
            INNER JOIN skillList AS sl ON hs.skillId = sl.id
            WHERE hs.heroId = :heroId');
        $stmt->execute(array(':heroId' => $hero->id));
        $result = $stmt->fetchAll();
        $pdo = null;
        foreach ($result as $elem) {
            $hero->skills->append(Skill::loadSkillFromArray($elem));
        }

        return $hero;
    }

    /**
     * @param $attribute string attribute to change (not escaped)
     * @param $newValue string value to change attribute to
     * @param $type int
     * @return bool
     */
    private function updateDBAttribute($attribute, $newValue, $type) {
        // make sure attribute is escaped since it can't be used as a PDO parameter
        $attribute = mysql_real_escape_string($attribute);

        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare("UPDATE hero SET $attribute = :newValue WHERE id = :id");
        $stmt->bindValue(':newValue', $newValue, $type);
        $stmt->bindValue(':id', intval($this->id), \PDO::PARAM_INT);
        if ($stmt->execute()) return true;
        return false;
    }
}