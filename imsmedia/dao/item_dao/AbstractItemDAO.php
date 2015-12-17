<?php
include_once("dao/AbstractDAO.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 17.12.2015
 * Time: 0:55
 */
abstract class AbstractItemDAO extends AbstractDAO
{
    public abstract function insertItem(Item $item);

    public abstract function insertItems(Items $items);

    public abstract function readItems();
}