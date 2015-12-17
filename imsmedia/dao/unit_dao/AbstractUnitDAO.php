<?php
include_once("dao/AbstractDAO.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 17.12.2015
 * Time: 0:55
 */
abstract class AbstractUnitDAO extends AbstractDAO
{
    public abstract function insertUnit(Unit $unit);

    public abstract function insertUnits(Units $units);

    public abstract function readUnits();
}