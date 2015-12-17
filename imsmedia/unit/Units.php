<?php
include_once("Unit.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 22:59
 */
interface Units
{
    function getUnits();

    function setUnits($unitsArray);

    function setUnit(Unit $unit);

    function getUnitByID($unitID);

    function getUnitByCode($unitCode);

}