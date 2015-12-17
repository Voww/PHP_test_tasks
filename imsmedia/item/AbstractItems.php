<?php
include_once("item/Items.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 17.12.2015
 * Time: 13:07
 */
abstract class AbstractItems implements Items
{

    protected $items = array();

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($itemsArray)
    {
        $this->items = $itemsArray;
    }

    public function setItem(Item $item)
    {
        $this->items[] = $item;
    }

    public function getItemByID($itemID)
    {
        $return = null;
        foreach ($this->items as $item) {
            if ($item->getID == $itemID) {
                $return = $item;
                break;
            }
        }
        return $return;
    }

    public function getItemByCode($itemCode)
    {
        $return = null;
        foreach ($this->items as $item) {
            if ($item->getCode() == $itemCode) {
                $return = $item;
                break;
            }
        }
        return $return;
    }

    public function __toString() {
        $output = __CLASS__ . " : { ";
        $output .= "items : array (";
        foreach ($this->items as $key => $item) {
            $output .= " [" . $key . "] => " . $item;
        }
        $output .= " ) }, ";
        return $output;
    }
}