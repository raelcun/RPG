<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/22/14
 * Time: 11:58 PM
 */

namespace Classes;

include_once('Environment.php');

class Party {
    private $id;
    private $name;
    private $cd;
    private $applicants;

    /**
     * Parameterless constructor for internally creating Heroes
     */
    private function __construct() { }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getCooldown() { return $this->cd; }
    public function getApplicants() { return explode(',', $this->applicants); }

    public function getMemberNames() {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('SELECT name FROM hero WHERE party = :party');
        $stmt->execute(array(':party' => $this->name));
        $result = $stmt->fetchAll();
        $pdo = null; // close connection

        $retArr = array();
        foreach ($result as $row) {
            array_push($retArr, $row['name']);
        }

        return $retArr;
    }

    public static function getPartyByName($name) {
        $pdo = Environment::getDBConn();
        $stmt = $pdo->prepare('
            SELECT *
            FROM party
            WHERE name = :name');
        $stmt->execute(array(':name' => $name));
        $result = $stmt->fetch();
        $pdo = null; // close connection

        return self::loadPartyFromArray($result);
    }

    private static function loadPartyFromArray($arr) {
        $party = new Party();

        $party->id = $arr['id'];
        $party->name = $arr['name'];
        $party->cd = (int)$arr['cd'];
        $party->applicants = $arr['applicants'];

        return $party;
    }
}