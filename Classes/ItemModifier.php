<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/14/14
 * Time: 12:06 AM
 */

namespace Classes;

include_once('Environment.php');

class ItemModifier {
    private $id;
    public $name;
    private $type;
    private $des;
    private $sdam;
    private $pdam;
    private $bdam;
    private $sarm;
    private $parm;
    private $barm;
    private $hpreg;
    private $mpreg;

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getType() { return $this->type; }
    public function getDescription() { return $this->des; }
    public function getSDAM() { return $this->sdam; }
    public function getPDAM() { return $this->pdam; }
    public function getBDAM() { return $this->bdam; }
    public function getSARM() { return $this->sarm; }
    public function getPARM() { return $this->parm; }
    public function getBARM() { return $this->barm; }
    public function getHpRegen() { return $this->hpreg; }
    public function getMpRegen() { return $this->mpreg; }

    public static function getItemModifierByName($name) {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('
            SELECT *
            FROM item_modifiers
            WHERE UPPER(name) = UPPER(:name)');
        $stmt->execute(array(':name' => $name));
        $result = $stmt->fetch();
        $pdo = null; // close connection

        return self::loadItemModifierFromArray($result);
    }

    public static function getItemModifierById($id) {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('
            SELECT *
            FROM item_modifiers
            WHERE id = :id');
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        $pdo = null; // close connection

        return self::loadItemModifierFromArray($result);
    }
    
    private static function loadItemModifierFromArray($arr) {
        $item = new ItemModifier();
        $item->id = $arr['id'];
        $item->name = $arr['name'];
        $item->des = $arr['des'];
        $item->sdam = $arr['sdam'];
        $item->pdam = $arr['pdam'];
        $item->bdam = $arr['bdam'];
        $item->sarm = $arr['sarm'];
        $item->parm = $arr['parm'];
        $item->barm = $arr['barm'];
        $item->hpreg = $arr['hpreg'];
        $item->mpreg = $arr['mpreg'];
        return $item;
    }
} 