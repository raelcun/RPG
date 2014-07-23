<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/6/14
 * Time: 11:25 PM
 */

namespace Classes;

include_once('Environment.php');
include_once('ItemModifier.php');

class Item {
    protected static $friendClasses = array('Classes\Item', 'Classes\InventoryItem');

    const SLOT_HEAD = "HEAD";
    const SLOT_HAND = "HAND";
    const SLOT_TORSO = "TORSO";
    const SLOT_FEET = "FEET";
    const SLOT_ARMS = "ARMS";
    const SLOT_LEGS = "LEGS";

    private $id;
    private $name;
    private $prefix_modifier;
    private $suffix_modifier;
    private $slot;
    private $des;
    private $market;
    private $sdam;
    private $pdam;
    private $bdam;
    private $sarm;
    private $parm;
    private $barm;
    private $hpreg;
    private $mpreg;

    /**
     * Parameterless constructor for internally creating Heroes
     */
    private function __construct() { }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPrefixModifier() { return $this->prefix_modifier; }
    public function getSuffixModifier() { return $this->suffix_modifier; }
    public function getSlot() { return $this->slot; }
    public function getDescription() { return $this->des; }
    public function getMarketValue() { return $this->market; }
    public function getSDAM() { return $this->sdam; }
    public function getPDAM() { return $this->pdam; }
    public function getBDAM() { return $this->bdam; }
    public function getSARM() { return $this->sarm; }
    public function getPARM() { return $this->parm; }
    public function getBARM() { return $this->barm; }
    public function getHpRegen() { return $this->hpreg; }
    public function getMpRegen() { return $this->mpreg; }
    public function getFullName() {
        $prefix = is_null($this->prefix_modifier) ? '' : $this->prefix_modifier->getName() . ' ';
        $suffix = is_null($this->suffix_modifier) ? '' : ' ' . $this->suffix_modifier->getName();
        return $prefix . $this->name . $suffix;
    }

    public static function getItemByFullName($fullname) {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('
            SELECT
              i.*
            FROM items i
            LEFT JOIN item_modifiers im_prefix ON i.prefix_modifier = im_prefix.id
            LEFT JOIN item_modifiers im_suffix ON i.suffix_modifier = im_suffix.id
            WHERE UPPER(TRIM(CONCAT(IFNULL(im_prefix.name, \'\'), \' \', i.name, \' \', IFNULL(im_suffix.name, \'\')))) = UPPER(:fullname)');
        $stmt->execute(array(':fullname' => $fullname));
        if ($stmt->rowCount() === 0) return null;
        $result = $stmt->fetch();
        $pdo = null; // close connection

        return self::loadItemFromArray($result);
    }

    public static function getAllItems() {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('SELECT * FROM items');
        $stmt->execute();
        $result = $stmt->fetchAll();

        $itemList = array();
        foreach ($result as $row) {
            array_push($itemList, self::loadItemFromArray($row));
        }

        return $itemList;
    }
    
    public static function loadItemFromArray($arr) {
        if (!($trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)) || !(isset($trace[1]['class']) && in_array($trace[1]['class'], static::$friendClasses))) {
            trigger_error('Member not available from calling class', E_USER_ERROR);
        }

        $item = new Item();
        $item->id = (int)$arr['id'];
        $item->name = $arr['name'];
        if (!is_null($arr['prefix_modifier'])) $item->prefix_modifier = ItemModifier::getItemModifierById($arr['prefix_modifier']);
        if (!is_null($arr['suffix_modifier'])) $item->suffix_modifier = ItemModifier::getItemModifierById($arr['suffix_modifier']);
        $item->slot = $arr['slot'];
        $item->des = $arr['des'];
        $item->market = (float)$arr['market'];
        $item->sdam = (int)$arr['sdam'];
        $item->pdam = (int)$arr['pdam'];
        $item->bdam = (int)$arr['bdam'];
        $item->sarm = (int)$arr['sarm'];
        $item->parm = (int)$arr['parm'];
        $item->barm = (int)$arr['barm'];
        $item->hpreg = (float)$arr['hpreg'];
        $item->mpreg = (float)$arr['mpreg'];
        return $item;
    }
} 