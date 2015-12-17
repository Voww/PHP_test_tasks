<?php

/**
 * A wrapper interface for all stock categories and products
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 9:53
 */
interface Item
{
    function isAGroup();

    function setIsAGroup($isAGroup);

    function getCode();

    function setCode($code);

    function getName();

    function setName($name);

    function getParent();

    function setParent(Item $item);
}