<?php
include_once("DAO.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 17.12.2015
 * Time: 0:34
 */
abstract class AbstractDAO implements DAO
{
    protected static $connection;

    public static function openConnection() {
        if (!is_resource(self::$connection)) {
            $properties = parse_ini_file("localhost_db_connection.ini");
            extract($properties);
            self::$connection = mysqli_connect($host, $user, $password, $db_name);
            mysqli_set_charset(self::$connection, 'cp1251');
        }
        return self::$connection;
    }

    public static function closeConnection() {
        mysqli_close(self::$connection);
    }

}