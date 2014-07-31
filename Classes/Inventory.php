<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/22/14
 * Time: 12:49 AM
 */

namespace Classes;

include_once('InventoryItem.php');

class Inventory extends \ArrayObject {
    protected static $friendClasses = array('Classes\InventoryItem', 'Classes\Hero');

    public function append($value) { // override
        if (!($trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)) || !(isset($trace[1]['class']) && in_array($trace[1]['class'], static::$friendClasses))) {
            trigger_error('Member not available from calling class', E_USER_ERROR);
        }
        if (!is_a($value, 'Classes\InventoryItem')) return false;

        parent::append($value);
    }

    public function remove($value) {
        if (!($trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)) || !(isset($trace[1]['class']) && in_array($trace[1]['class'], static::$friendClasses))) {
            trigger_error('Member not available from calling class', E_USER_ERROR);
        }
        if (!is_a($value, 'Classes\InventoryItem')) return false;

        $indexes = array_keys(parent, $value, true);
        array_splice($this->innerArray, $indexes[0], 1);
    }

    /** Returns all inventory items given conditional function
     * @param $func (InventoryItem) => bool
     * @return array
     */
    public function where($func) {
        $retArr = array();
        foreach ($this as $item)
            if ($func($item))
                array_push($retArr, $item);
        return $retArr;
    }

    public function select($func) {
        $retArr = array();
        foreach ($this as $item)
            array_push($retArr, $func($item));
        return $retArr;
    }

    public function getEquippedItems() {
        return $this->where(function ($inventoryItem) { return $inventoryItem->getEquip() >= 1; });
    }

    public function getTotalMpRegen() { return array_sum(array_map(function ($i) { return $i->getEquip() === 0 ? 0 : $i->getItem()->getMpRegen(); }, parent::getArrayCopy())); }
    public function getTotalHpRegen() { return array_sum(array_map(function ($i) { return $i->getEquip() === 0 ? 0 : $i->getItem()->getHpRegen(); }, parent::getArrayCopy())); }
    public function getTotalSDAM() { return array_sum(array_map(function ($i) { return $i->getEquip() === 0 ? 0 : $i->getItem()->getSDAM(); }, parent::getArrayCopy())); }
    public function getTotalPDAM() { return array_sum(array_map(function ($i) { return $i->getEquip() === 0 ? 0 : $i->getItem()->getPDAM(); }, parent::getArrayCopy())); }
    public function getTotalBDAM() { return array_sum(array_map(function ($i) { return $i->getEquip() === 0 ? 0 : $i->getItem()->getBDAM(); }, parent::getArrayCopy())); }
    public function getTotalSARM() { return array_sum(array_map(function ($i) { return $i->getEquip() === 0 ? 0 : $i->getItem()->getSARM(); }, parent::getArrayCopy())); }
    public function getTotalPARM() { return array_sum(array_map(function ($i) { return $i->getEquip() === 0 ? 0 : $i->getItem()->getPARM(); }, parent::getArrayCopy())); }
    public function getTotalBARM() { return array_sum(array_map(function ($i) { return $i->getEquip() === 0 ? 0 : $i->getItem()->getBARM(); }, parent::getArrayCopy())); }
}