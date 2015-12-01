<?php
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 01.12.2015
 * Time: 23:51
 */

include_once('steampoweredAPIbase.php');

if (isset($_GET['reference'])) {
    $reference = $_GET['reference'];
} else {
    $reference = 0;
}

switch ($reference) {
    case 1:
        $api = new \steampoweredAPI\steampoweredAPIbase();
        $api->setInterface('ISteamApps');
        $api->setMethod('GetAppList');
        $api->setMethodVersion(2);
        break;
    case 2:
        $api = new \steampoweredAPI\steampoweredAPIbase();
        $api->setInterface('ISteamNews');
        $api->setMethod('GetNewsForApp');
        $api->setMethodVersion(2);
        $api->setParameters(array('appid' => 10));
        break;
    default:
        $api = new \steampoweredAPI\steampoweredAPIbase();
        break;
}

$result = $api->doRequest();