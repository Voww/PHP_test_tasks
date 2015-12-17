<?php
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 22:59
 */
interface Items
{
    function getItems();

    function setItems($itemsArray);

    function setItem(Item $item);

    function getItemByID($itemID);

    function getItemByCode($itemCode);

}