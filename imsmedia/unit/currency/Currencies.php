<?php
include_once("unit/AbstractUnits.php");

/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 22:34
 */

class Currencies extends AbstractUnits
{
    public function __toString() {
        $output = __CLASS__ . " : { ";
        $output .= "units : array (" . PHP_EOL;
        foreach ($this->units as $key => $unit) {
            $output .= " [" . $key . "] => " . $unit . ", " . PHP_EOL;
        }
        $output .= " ) }, ";
        return $output;
    }
}