<?php
include_once ("parser/ParsedProduct.php");
/**
 * An object representation of an XML-parsed row. Implements ParesdProduct.
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 10:03
 * @see  ParesdProduct
 */
class XMLParsedProduct implements ParsedProduct
{

    /**
     * determines whatever an item is a product or a category
     * @var boolean - true if an item is a category, false if it is a product
     */
    private $isAGroup;

    /**
     * @var string - an item's category name
     */
    private $category;

    /**
     * @var string - an item's category code
     */
    private $categoryCode;

    /**
     * @var string - an item's articul number
     */
    private $articul;

    /**
     * @var string - an item's code
     */
    private $code;

    /**
     * @var string - an item's name
     */
    private $name;

    /**
     * @var string - an item's basic measurement unit
     */
    private $basicMeasurementUnit;

    /**
     * @var number - an item's price
     */
    private $price;

    /**
     * @var string - an item's currency
     */
    private $currency;

    /**
     * @var string - an item's measurement unit
     */
    private $measurementUnit;

    /**
     * @return boolean
     */
    public function isAGroup()
    {
        return $this->isAGroup;
    }

    /**
     * @param boolean $isAGroup
     */
    public function setIsAGroup($isAGroup)
    {
        $this->isAGroup = $isAGroup;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
    }

    /**
     * @param string $categoryCode
     */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = $categoryCode;
    }

    /**
     * @return string
     */
    public function getArticul()
    {
        return $this->articul;
    }

    /**
     * @param string $articul
     */
    public function setArticul($articul)
    {
        $this->articul = $articul;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBasicMeasurementUnit()
    {
        return $this->basicMeasurementUnit;
    }

    /**
     * @param string $basicMeasurementUnit
     */
    public function setBasicMeasurementUnit($basicMeasurementUnit)
    {
        $this->basicMeasurementUnit = $basicMeasurementUnit;
    }

    /**
     * @return number
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param number $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getMeasurementUnit()
    {
        return $this->measurementUnit;
    }

    /**
     * @param string $measurementUnit
     */
    public function setMeasurementUnit($measurementUnit)
    {
        $this->measurementUnit = $measurementUnit;
    }

    function __toString()
    {
        $output = __CLASS__ . " : { ";
        $output .= "isAGroup : " . ($this->isAGroup ? 'true' : 'false');
        $output .= "; category : " . $this->category;
        $output .= "; categoryCode : " . $this->categoryCode;
        $output .= "; articul : " . $this->articul;
        $output .= "; code : " . $this->code;
        $output .= "; name : " . $this->name;
        $output .= "; basicMeasurementUnit : " . $this->basicMeasurementUnit;
        $output .= "; price : " . $this->price;
        $output .= "; currency : " . $this->currency;
        $output .= "; measurementUnit : " . $this->measurementUnit;
        $output .= " };";
        return $output;
    }


}