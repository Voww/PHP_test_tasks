<?php
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 01.12.2015
 * Time: 23:52
 */

namespace steampoweredAPI;
include_once('SteampoweredAPIbase.php');

class ISteamNews extends SteampoweredAPIbase  {


    /**
     * ISteamWebAPIUtil constructor.
     */
    public function __construct()
    {
        $this->setInterface('ISteamNews');
    }

    public function GetNewsForApp($appid, $maxlength = null, $enddate = null, $count = null) {
        $this->setMethod('GetNewsForApp');
        $this->setParameters(array('appid' => $appid, 'maxlength' => $maxlength, 'enddate' => $enddate, 'count' => $count));
        $responce = $this->doRequest();
        return $responce;
    }
}