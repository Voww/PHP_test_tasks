<?php
include_once("item/AbstractItem.php");

/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 22:57
 */
class Product extends AbstractItem
{

    private $articul;

    private $basicMeasurementUnit;

    private $price;

    private $currency;

    private $measurementUnit;

    public function getArticul()
    {
        return $this->articul;
    }

    public function setArticul($articul)
    {
        $this->articul = $articul;
    }

    public function getBasicMeasurementUnit()
    {
        return $this->basicMeasurementUnit;
    }

    public function setBasicMeasurementUnit(Measurement $basicMeasurementUnit)
    {
        $this->basicMeasurementUnit = $basicMeasurementUnit;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
    }

    public function getMeasurementUnit()
    {
        return $this->measurementUnit;
    }

    public function setMeasurementUnit(Measurement $measurementUnit)
    {
        $this->measurementUnit = $measurementUnit;
    }

    function __toString()
    {
        $output = __CLASS__ . " : { ";
        $output .= " code : " . $this->code;
        $output .= "; articul : " . $this->articul;
        $output .= "; name : " . $this->name;
        $output .= "; basicMeasurementUnit : " . $this->basicMeasurementUnit;
        $output .= "; price : " . $this->price;
        $output .= "; currency : " . $this->currency;
        $output .= "; measurementUnit : " . $this->measurementUnit;
        $output .= "; parentCategory : " . PHP_EOL . "&nbsp;&nbsp;&nbsp;" . ($this->getParent() == null ? '' : $this->getParent());
        $output .= " };" . PHP_EOL;
        return $output;
    }
}