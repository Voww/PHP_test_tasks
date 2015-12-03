<?php
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 01.12.2015
 * Time: 23:52
 */

namespace steampoweredAPI;
include_once('SteampoweredAPIbase.php');

class ISteamApps extends SteampoweredAPIbase  {


    /**
     * ISteamWebAPIUtil constructor.
     */
    public function __construct()
    {
        $this->setInterface('ISteamApps');
    }

    public function GetAppList() {
        $this->setMethod('GetAppList');
        $responce = $this->doRequest();
        return $responce;
    }

    public function GetServersAtAddress($addr) {
        $this->setMethod('GetServersAtAddress');
        $this->setParameters(array('addr' => $addr));
        $responce = $this->doRequest();
        return $responce;
    }

    public function UpToDateCheck($appid, $version) {
        $this->setMethod('UpToDateCheck');
        $this->setParameters(array('appid' => $appid, 'version' => $version));
        $responce = $this->doRequest();
        return $responce;
    }
}