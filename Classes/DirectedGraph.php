<?php
/**
 * Created by PhpStorm.
 * User: danieltaylor
 * Date: 7/31/14
 * Time: 1:02 AM
 */

namespace Classes;

class GraphNode {
    private $value;
    private $connectedNodes; // array of GraphNode

    public function getValue() { return $this->value; }
    public function getConnectedNodes() { return $this->connectedNodes; }

    public function setValue($newValue) { $this->value = $newValue; }
    public function addConnectedNode($node) { $this->connectedNodes->append($node); }

    public function __construct($value) {
        $this->setValue($value);
        $this->connectedNodes = array();
    }
}

class DirectedGraph {
    protected $root;

    public function __construct($rootValue) {
        $this->root = new GraphNode($rootValue);
    }

    /**
     * @param $value
     * @return bool
     */
    public function contains($value) { return !is_null(self::getNode($value, $this->root)); }

    /**
     * @param $sourceValue
     * @return array|bool
     */
    public function getConnectedNodeValues($sourceValue) {
        $sourceNode = self::getNode($sourceValue, $this->root);
        if (is_null($sourceNode)) return false;

        $retArr = array();
        foreach ($sourceNode->getConnectedNodes() as $node)
            array_push($retArr, $node->getValue());

        return $retArr;
    }

    /**
     * @param $value Value to add to the graph
     * @param $connectToArr Array of values to connect to (direction from array element to new element)
     * @return bool
     */
    public function insert($value, $connectToArr) {
        if (self::contains($value)) return false;
        if (is_null($connectToArr)) $connectToArr = $this->root;

        $newNode = new GraphNode($value);
        $bNodeAdded = false;

        foreach ($connectToArr as $connectToNodeValue) {
            $connectToNode = self::getNode($connectToNodeValue, $this->root);
            if (is_null($connectToNode)) continue; // if node to connect to cannot be found, skip it
            $connectToNode->addConnectedNode($newNode);
            $bNodeAdded = true;
        }

        return $bNodeAdded;
    }

    private function getNode($value, $root) {
        if ($root->getValue() === $value) return $root;
        foreach ($root->getConnectedNodes() as $connectedNode)
            if (!is_null(self::getNode($value, $connectedNode))) return $connectedNode;
        return null;
    }
} 