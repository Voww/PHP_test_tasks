<?php
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 01.12.2015
 * Time: 23:52
 */

namespace steampoweredAPI;
include_once('SteampoweredAPIbase.php');

class ISteamWebAPIUtil extends SteampoweredAPIbase  {


    /**
     * ISteamWebAPIUtil constructor.
     */
    public function __construct()
    {
        $this->setInterface('ISteamWebAPIUtil');
    }

    public function GetSupportedAPIList() {
        $this->setMethod('GetSupportedAPIList');
        $responce = $this->doRequest();
        return $responce;
    }
}