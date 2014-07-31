<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/27/14
 * Time: 10:55 AM
 */

namespace Classes;

class Skill {
    protected static $friendClasses = array('Classes\Hero', 'Classes\Skill');

    /* @var int */ private $id;
    /* @var string */ private $name;
    /* @var string */ private $prof;
    /* @var int */ private $cost;
    /* @var string */ private $effect;
    /* @var string */ private $type;
    /* @var string */ private $range;
    /* @var string */ private $duration;
    /* @var string */ private $targets;

    private function __construct() { }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getProf() { return $this->prof; }
    public function getCost() { return $this->cost; }
    public function getEffect() { return $this->effect; }
    public function getType() { return $this->type; }
    public function getRange() { return $this->range; }
    public function getDuration() { return $this->duration; }
    public function getTargets() { return $this->targets; }

    public static function getSkillByName($name) {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('
            SELECT
              *
            FROM skills
            WHERE name = :name');
        $stmt->execute(array(':name' => $name));
        if ($stmt->rowCount() === 0) return null;
        $result = $stmt->fetch();
        $pdo = null; // close connection

        return self::loadSkillFromArray($result);
    }

    public static function loadSkillFromArray($arr) {
        if (!($trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)) || !(isset($trace[1]['class']) && in_array($trace[1]['class'], static::$friendClasses))) {
            trigger_error('Member not available from calling class', E_USER_ERROR);
        }

        $ability = new Skill();
        $ability->id = (int)$arr['id'];
        $ability->name = $arr['name'];
        $ability->prof = $arr['prof'];
        $ability->cost = (int)$arr['cost'];
        $ability->effect = $arr['effect'];
        $ability->type = $arr['type'];
        $ability->range = $arr['range'];
        $ability->duration = $arr['duration'];
        $ability->targets = $arr['targets'];

        return $ability;
    }
} 