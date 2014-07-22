<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/21/14
 * Time: 12:38 AM
 */

namespace Classes;

include_once('Item.php');

class InventoryItem {
    protected static $friendClasses = array('Classes\InventoryItem', 'Classes\Hero');

    private $id;
    private $item;
    private $equip;

    /**
     * Parameterless constructor for internally creating Heroes
     */
    private function __construct() { }

    public function getId() { return $this->id; }
    public function getItem() { return $this->item; }
    public function getEquip() { return $this->equip; }

    public function setEquip($equip) {
        if (!is_int($equip)) return false;
        if (!self::updateDBAttribute('equip', $equip, \PDO::PARAM_INT)) return false;
        $this->equip = $equip;
        return true;
    }

    public static function loadInventoryItemFromArray($itemArr, $inventoryArr) {
        if (!($trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)) || !(isset($trace[1]['class']) && in_array($trace[1]['class'], static::$friendClasses))) {
            trigger_error('Member not available from calling class', E_USER_ERROR);
        }

        print_r($itemArr);
        print_r($inventoryArr);

        $item = new InventoryItem();
        $item->id = (int)$inventoryArr['id'];
        $item->item = Item::loadItemFromArray($itemArr);
        $item->equip = (int)$inventoryArr['equip'];
        return $item;
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
        $stmt = $pdo->prepare("UPDATE inventory SET $attribute = :newValue WHERE id = :id");
        $stmt->bindValue(':newValue', $newValue, $type);
        $stmt->bindValue(':id', intval($this->id), \PDO::PARAM_INT);
        if ($stmt->execute()) return true;
        return false;
    }
} 