<?php
include_once("unit/AbstractUnit.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 19:15
 */
class Currency extends AbstractUnit
{
    public function __toString()
    {
        $output = __CLASS__ . ": { ";
        $output .= "id : " . $this->id;
        $output .= "; code : " . $this->code;
        $output .= " }";
        return $output;
    }


}