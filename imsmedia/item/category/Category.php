<?php
include_once("item/AbstractItem.php");

/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 22:57
 */
class Category extends AbstractItem
{
    function __toString()
    {
        $output = __CLASS__ . " : { ";
        $output .= " code : " . $this->code;
        $output .= "; name : " . $this->name;
        $output .= "; parentCategory : " . PHP_EOL . "&nbsp;&nbsp;&nbsp;" . ($this->getParent() == null ? '' : $this->getParent());
        $output .= " }";
        return $output;
    }
}