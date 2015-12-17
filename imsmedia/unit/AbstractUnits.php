<?php
include_once("Units.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 23:06
 */
abstract class AbstractUnits implements Units
{
    protected $units = array();

    function getUnits()
    {
        return $this->units;
    }

    function setUnits($unitsArray)
    {
        $this->units = $unitsArray;
    }


    function setUnit(Unit $unit)
    {
        $this->units[] = $unit;
    }

    function getUnitByID($unitID)
    {
        $return = null;
        foreach ($this->units as $unit) {
            if ($unit->getID == $unitID) {
                $return = $unit;
                break;
            }
        }
        return $return;
    }

    function getUnitByCode($unitCode)
    {
        $return = null;
        foreach ($this->units as $unit) {
            if ($unit->getCode() == $unitCode) {
                $return = $unit;
                break;
            }
        }
        return $return;
    }

    public function __toString() {
        $output = __CLASS__ . " : { ";
        $output .= "units : array (";
        foreach ($this->units as $key => $unit) {
            $output .= " [" . $key . "] => " . $unit;
        }
        $output .= " ) }, ";
        return $output;
    }
}