<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/6/14
 * Time: 4:20 PM
 */

namespace Classes;

include_once('Environment.php');

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
    private $battleplan;

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getRace() { return $this->race; }
    public function getProfession() { return $this->prof; }
    public function getXp() { return $this->xp; }
    public function getParty() { return $this->party; }
    public function getStrength() { return $this->str; }
    public function getConstitution() { return $this->con; }
    public function getAgility() { return $this->agi; }
    public function getDexterity() { return $this->dex; }
    public function getIntelligence() { return $this->int; }
    public function getWisdom() { return $this->wis; }
    public function getCharisma() { return $this->cha; }
    public function getActtions() { return $this->act; }
    public function getPerception() { return $this->per; }
    public function getGold() { return $this->gold; }
    public function getBattleplan() { return $this->battleplan; }

    public function setXp($xp) { $this->xp = $xp; return $this->updateDBAttribute('xp', $xp, \PDO::PARAM_INT, \PDO::PARAM_STR); }
    public function setParty($party) { $this->party = $party; return $this->updateDBAttribute('party', $party, \PDO::PARAM_STR); }
    public function setStrength($str) { $this->str = $str; return $this->updateDBAttribute('str', $str, \PDO::PARAM_INT); }
    public function setConstitution($con) { $this->con = $con; return $this->updateDBAttribute('con', $con, \PDO::PARAM_INT); }
    public function setAgility($agi) { $this->agi = $agi; return $this->updateDBAttribute('agi', $agi, \PDO::PARAM_INT); }
    public function setDexterity($dex) { $this->dex = $dex; return $this->updateDBAttribute('dex', $dex, \PDO::PARAM_INT); }
    public function setIntelligence($int) { $this->int = $int; return $this->updateDBAttribute('int', $int, \PDO::PARAM_INT); }
    public function setWisdom($wis) { $this->wis = $wis; return $this->updateDBAttribute('wis', $wis, \PDO::PARAM_INT); }
    public function setCharisma($cha) { $this->cha = $cha; return $this->updateDBAttribute('cha', $cha, \PDO::PARAM_INT); }
    public function setActions($act) { $this->act = $act; return $this->updateDBAttribute('act', $act, \PDO::PARAM_INT); }
    public function setPerception($per) { $this->per = $per; return $this->updateDBAttribute('per', $per, \PDO::PARAM_INT); }
    public function setGold($gold) { $this->gold = $gold; return $this->updateDBAttribute('gold', $gold, \PDO::PARAM_INT); }
    public function setBattleplan($battleplan) { $this->battleplan = $battleplan; return $this->updateDBAttribute('battleplan', $battleplan, \PDO::PARAM_STR); }

    public function setRace($race) {
        // validate race
        $validRace = self::parseRace($race);
        if ($validRace === false) return false;

        $this->race = $validRace;
        return $this->updateDBAttribute('race', $validRace, \PDO::PARAM_STR);
    }

    public function setProfession($prof) {
        // validate profession
        $validProf = self::parseProfession($prof);
        if ($validProf === false) return false;

        $this->prof = $validProf;
        return $this->updateDBAttribute('prof', $validProf, \PDO::PARAM_STR);
    }

    /**
     * @param $name
     * @return Hero Hero object with attributes populated by database
     */
    public static function getHeroByName($name) {
        $hero = new Hero();
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('SELECT * FROM hero WHERE name = :name');
        $stmt->execute(array(':name' => $name));
        $result = $stmt->fetch();

        $hero->id = $result['id'];
        $hero->name = $result['name'];
        $hero->race = $result['race'];
        $hero->prof = $result['prof'];
        $hero->xp = $result['xp'];
        $hero->party = $result['party'];
        $hero->str = $result['str'];
        $hero->con = $result['con'];
        $hero->agi = $result['agi'];
        $hero->dex = $result['dex'];
        $hero->int = $result['int'];
        $hero->wis = $result['wis'];
        $hero->cha = $result['cha'];
        $hero->act = $result['act'];
        $hero->per = $result['per'];
        $hero->gold = $result['gold'];
        $hero->battleplan = $result['battleplan'];

        $pdo = null; // close connection

        return $hero;
    }

    /**
     * @param $name
     * @return bool
     */
    public static function doesHeroExist($name) {
        $pdo = Environment::getDBConn();

        $stmt = $pdo->prepare('SELECT * FROM hero WHERE name = :name');
        $stmt->execute(array(':name' => $name));
        return $stmt->rowCount() >= 1;
    }

    /** Create hero in database and returns it
     * @param $name
     * @param $password
     * @return bool|Hero|null
     */
    public static function createHero($name, $password) {
        if (self::doesHeroExist($name)) return false;

        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('INSERT INTO hero (name, pw) VALUES (:name, :pw)');
        $result = $stmt->execute(array(':name' => $name, ':pw' => sha1($password)));
        $pdo = null;

        if ($result) {
            return self::getHeroByName($name);
        }

        return null;
    }

    /** Validation race string format
     * @param $race
     * @return bool|string Valid race if validation is successful, false otherwise
     */
    public static function parseRace($race) {
        return self::validateStringIC($race, array(self::RACE_HUMAN, self::RACE_DWARF, self::RACE_ELF, self::RACE_ORC));
    }

    /** Validate profession string format
     * @param $prof
     * @return bool|string Valid profession if validation is successful, false otherwise
     */
    public static function parseProfession($prof) {
        return self::validateStringIC($prof, array(self::PROF_ARCHER, self::PROF_BARBARIAN, self::PROF_KNIGHT, self::PROF_MAGE, self::PROF_PRIEST));
    }

    /**
     * @param $attribute attribute to change (not escaped)
     * @param $newValue value to change attribute to
     * @param $type typeof PDO::PARAM_XXX
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

    /**
     * Validates a given string case insensitively as a
     * string of valid format provided in an array.
     * @param $validate string to validate
     * @param $strArray array of strings with valid format
     * @return mixed valid string on success, false on failure
     */
    private static function validateStringIC($validate, $strArray) {
        if (is_array($strArray) === false) return false;

        foreach ($strArray as $str) {
            if (strtoupper($validate) === strtoupper($str))
                return $str;
        }

        return false;
    }
}