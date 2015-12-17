<?php
include_once("parser/Parser.php");
include_once("XMLParserException.php");
include_once("unit/currency/Currency.php");
include_once("unit/currency/Currencies.php");
include_once("unit/measurement/Measurement.php");
include_once("unit/measurement/Measurements.php");
include_once("item/category/Category.php");
include_once("item/category/Categories.php");
include_once("item/product/Product.php");
include_once("item/product/Products.php");
include_once("XMLParsedProduct.php");
include_once("dao/unit_dao/CurrencyDAO.php");
include_once("dao/unit_dao/MeasurementDAO.php");
include_once("dao/item_dao/CategoryDAO.php");
include_once("dao/item_dao/ProductDAO.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 9:48
 */
class XMLParser implements Parser {

    private $xmlCategories = array();
    private $xmlProducts = array();
    /**
     * @return array
     */
    public function getXmlCategories()
    {
        return $this->xmlCategories;
    }

    /**
     * @return array
     */
    public function getXmlProducts()
    {
        return $this->xmlProducts;
    }

    /**
     * Parses an XML-file specified by file name
     * @param a $content
     * @throws XMLParserException
     */
    public function parse($content) {
        $parser = xml_parser_create();
        xml_set_element_handler($parser, array($this, "start_element_handler"), array($this, "end_element_handler"));
        xml_parse($parser, $content);
        $err_code =  xml_get_error_code($parser);
        if ($err_code) {
            throw new XMLParserException("XML parser error: " . xml_error_string($err_code), 0);
        }
        xml_parser_free($parser);
    }

    function start_element_handler ($parser , $name , $attribs ) {
        if ($name == 'PRICE') {
            //Verifying correct file structure. Nothing to do
        } else if ($name == 'PRODUCT') {
            $product = new XMLParsedProduct();
            $values = array_values($attribs);
            $product->setIsAGroup(($values[0] == 'истина') ? true : false);
            $product->setCategory(iconv("UTF-8", "windows-1251", $values[1]));
            $product->setCategoryCode($values[2]);
            $product->setArticul($values[3]);
            $product->setCode($values[4]);
            $product->setName(iconv("UTF-8", "windows-1251", $values[5]));
            $product->setBasicMeasurementUnit(iconv("UTF-8", "windows-1251", $values[6]));
            $product->setPrice((floatval(str_replace(",", ".", $values[7]))));
            $product->setCurrency(iconv("UTF-8", "windows-1251", $values[8]));
            $product->setMeasurementUnit(iconv("UTF-8", "windows-1251", $values[9]));
            if ($product->isAGroup()) {
                array_push($this->xmlCategories, $product);
            } else {
                array_push($this->xmlProducts, $product);
            }

        } else {
            throw new XMLParserException("Incompatible XML file format", 1);
        }
    }

    function end_element_handler ($parser , $name ) {
        //Nothing to do
    }

    public function parseMeasurements() {
        $measurements = new Measurements();
        $keyParams = array();
        foreach ($this->xmlProducts as $product) {
            $bmu = $product->getBasicMeasurementUnit();
            $mu = $product->getMeasurementUnit();
            if (!empty($bmu) && !in_array($bmu, $keyParams)) {
                $measurement = new Measurement();
                $measurement->setCode($bmu);
                $measurements->setUnit($measurement);
                array_push($keyParams, $bmu);
            }
            if (!empty($mu) && !in_array($mu, $keyParams)) {
                array_push($keyParams, $mu);
                $measurement = new Measurement();
                $measurement->setCode($mu);
                $measurements->setUnit($measurement);
            }
        }

        $measurementDAO = new MeasurementDAO();
        $measurementDAO->insertUnits($measurements);
        $measurements = $measurementDAO->readUnits();
        return $measurements;
    }

    public function parseCurrencies() {
        $currencies = new Currencies();
        $keyParams = array();
        foreach ($this->xmlProducts as $product) {
            $cur = $product->getCurrency();
            if (!empty($cur) && !in_array($cur, $keyParams)) {
                array_push($keyParams, $cur);
                $currency = new Currency();
                $currency->setCode($cur);
                $currencies->setUnit($currency);
            }
        }
        $currencyDAO = new CurrencyDAO();
        $currencyDAO->insertUnits($currencies);
        $currencies = $currencyDAO->readUnits();

        return $currencies;
    }

    public function parseCategories() {
        $categories = new Categories();
        $keyParams = array();

        foreach ($this->xmlCategories as $xmlCategory) {
            $code = $xmlCategory->getCode();
            $name = $xmlCategory->getName();
            $isAGroup = $xmlCategory->isAGroup();
            if (!empty($code) && !in_array($code, $keyParams)) {
                array_push($keyParams, $code);
                $category = new Category();
                $category->setIsAGroup($isAGroup);
                $category->setCode($code);
                $category->setName($name);

                $categories->setItem($category);
            }
        }
        foreach ($this->xmlCategories as $xmlCategory) {
            $catCode = $xmlCategory->getCategoryCode();
            $code = $xmlCategory->getCode();
            $current = $categories->getItemByCode($code);
            $parent = $categories->getItemByCode($catCode);
            if ($parent != null) {
                $current->setParent($parent);
            }
        }

        $categoryDAO = new CategoryDAO();
        $categoryDAO->insertItems($categories);
        return $categories;
    }

    public function parseProducts() {
        $products = new Products();
        $keyParams = array();
        $currencies = $this->parseCurrencies();
        $measurements = $this->parseMeasurements();

        foreach ($this->xmlProducts as $xmlProduct) {
            $code = $xmlProduct->getCode();
            $name = $xmlProduct->getName();
            $isAGroup = $xmlProduct->isAGroup();
            $articul = $xmlProduct->getArticul();
            $basicMeasurementUnitCode = $xmlProduct->getBasicMeasurementUnit();
            $basicMeasurementUnit = $measurements->getUnitByCode($basicMeasurementUnitCode);
            $price = $xmlProduct->getPrice();
            $currencyCode = $xmlProduct->getCurrency();
            $currency = $currencies->getUnitByCode($currencyCode);
            $measurementUnitCode = $xmlProduct->getBasicMeasurementUnit();
            $measurementUnit = $measurements->getUnitByCode($measurementUnitCode);
            if (!empty($code) && !in_array($code, $keyParams)) {
                array_push($keyParams, $code);
                $product = new Product();
                $product->setIsAGroup($isAGroup);
                $product->setCode($code);
                $product->setName($name);
                $product->setArticul($articul);
                $product->setBasicMeasurementUnit($basicMeasurementUnit);
                $product->setPrice($price);
                $currency == null ? '' : $product->setCurrency($currency);
                $measurementUnit == null ? '' : $product->setMeasurementUnit($measurementUnit);

                $products->setItem($product);
            }
        }
        $categories = $this->parseCategories();
        foreach ($this->xmlProducts as $xmlProduct) {
            $catCode = $xmlProduct->getCategoryCode();
            $code = $xmlProduct->getCode();
            $current = $products->getItemByCode($code);
            $parent = $categories->getItemByCode($catCode);
            if ($parent != null) {
                $current->setParent($parent);
            }
        }

        $productDAO = new ProductDAO();
        $productDAO->insertItems($products);
        return $products;
    }
}