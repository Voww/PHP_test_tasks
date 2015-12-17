<?php

/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 9:57
 */
include_once("Item.php");

class AbstractItem implements Item
{

    protected $isAGroup;

    protected $code;

    protected $name;

    protected $parent;

    public function isAGroup() {
        return $this->isAGroup;
    }

    public function setIsAGroup($isAGroup) {
        $this->isAGroup = $isAGroup;
    }

    function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getParent() {
        return $this->parent;
    }

    public function setParent(Item $item) {
        if ($item->isAGroup()) {
            $this->parent = $item;
        }
    }

    function __toString()
    {
        $output = __CLASS__ . " : { ";
        $output .= "isAGroup : " . ($this->isAGroup ? 'true' : 'false');
        $output .= "; code : " . $this->code;
        $output .= "; name : " . $this->name;
        $output .= " };" . PHP_EOL;
        return $output;
    }
}