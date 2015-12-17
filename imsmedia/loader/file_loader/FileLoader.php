<?php

/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 9:48
 */

include_once("loader/Loader.php");
include_once("FileLoaderException.php");

class FileLoader implements Loader {

    var $uploaddir = 'C:/wamp/www/testserver.int/imsmedia/uploads/';

    public function load() {

        $uploadFileName = $this->uploaddir . basename($_FILES['xml_file']['name']);
        move_uploaded_file($_FILES['xml_file']['tmp_name'], $uploadFileName);
        if (!is_file($uploadFileName) || $_FILES['xml_file']['error']) {
            throw new FileLoaderException("Can't upload a file. Error code :" . $_FILES['xml_file']['error'], 0);
        }
        return $uploadFileName;
    }
}