<?php


/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 10:35
 */

set_include_path("C:/wamp/www/testserver.int/imsmedia/");
include_once("parser/xml_parser/XMLParser.php");
include_once("loader/file_loader/FileLoader.php");

include_once("IMSMediaHeader.html");

$parser = new XMLParser();
$loader = new FileLoader();

$output = '<a href="/imsmedia/Import.html"><button>Back</button></a><hr>';
try {
    $uploadFileName = $loader->load();
    $output .= "A file was imported succesfully<br>";
    $content = file_get_contents($uploadFileName);

    $parser->parse($content);
    $currencies = $parser->parseCurrencies();
    $measurements = $parser->parseMeasurements();
    $categories = $parser->parseCategories();
    $products = $parser->parseProducts();
    AbstractDAO::closeConnection();

    $output .= "<h2>Measurements</h2>";
    $output .= nl2br($measurements);

    $output .= "<h2>Currencies</h2>";
    $output .= nl2br($currencies);

    $output .= "<h2>Categories</h2>";
    $output .= nl2br($categories);

    $output .= "<h2>Products</h2>";
    $output .= nl2br($products);

} catch (Exception $e) {
    $output .= "Upload is failed<hr>" . $e->getMessage() . " " . $e->getTraceAsString();
}
echo $output;




