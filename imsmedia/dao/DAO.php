<?php

/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 17.12.2015
 * Time: 0:32
 */
interface DAO
{
    static function openConnection();

    static function closeConnection();
}