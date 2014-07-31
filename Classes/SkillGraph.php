<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/31/14
 * Time: 1:41 AM
 */

namespace Classes;

include_once('Classes/Environment.php');
include_once('Classes/DirectedGraph.php');

class SkillGraph {
    private $directedGraph;

    private function __construct() {

    }

    public static function Generate() {
        return new SkillGraph();
    }
} 