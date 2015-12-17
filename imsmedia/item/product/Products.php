<?php
include_once("item/AbstractItems.php");

/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 22:34
 */

class Products extends AbstractItems
{
    public function __toString() {
        $output = __CLASS__ . " : { ";
        $output .= "items : array (" . PHP_EOL;
        foreach ($this->items as $key => $item) {
            $output .= " [" . $key . "] => " . $item;
        }
        $output .= " ) }";
        return $output;
    }
}