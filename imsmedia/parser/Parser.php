<?php

/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 9:39
 */
interface Parser
{

    /**
     * Parses a resource specified by resource name
     * @param $resourceName a resource name
     * @return void
     * @throws
     */
    function parse($resourceName);

}