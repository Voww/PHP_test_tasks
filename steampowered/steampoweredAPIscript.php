<?php
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 01.12.2015
 * Time: 23:51
 */

if (isset($_GET['reference'])) {
    $reference = $_GET['reference'];
} else {
    $reference = '';
}

switch ($reference) {
    case 'GetAppList':
        include_once('ISteamApps.php');
        $api = new \steampoweredAPI\ISteamApps();
        $responce = $api->GetAppList();
        $json = json_decode($responce);
        $output = '<table border="1"><thead><tr><td><h2>Aplication ID</h2></td><td><h2>Application name</h2></td><td><h2>Action</h2></td></tr><thead><tbody>';
        foreach ($json->applist->apps->app as $app) {
            $newsButton = '<a href="steampoweredAPIscript.php?reference=GetNewsForApp&appid=' . $app->appid . '"><button>Get news</button></a>';
            $output .= '<tr><td>' . $app->appid . '</td><td>' . $app->name . '</td><td>' . $newsButton . '</td></tr>';
        }
        $output .= '</tbody></table>';
        echo $output;

        break;
    case 'GetNewsForApp':
        include_once('ISteamNews.php');
        $api = new \steampoweredAPI\ISteamNews();
        $responce = $api->GetNewsForApp($_GET['appid']);
        $json = json_decode($responce);
        $output = '<table border="1"><thead><tr><td colspan="2"><h2>NEWS</h2></td></tr><thead><tbody>';
        if (isset($json->appnews->newsitems->newsitem)) {
            foreach ($json->appnews->newsitems->newsitem as $news) {
                $output .= '<tr><td>title:</td><td><h3>' . (empty($news->title) ? 'Without Title' : $news->title) . '</h3></td></tr>';
                $output .= '<tr><td>author:</td><td><h4>' . (empty($news->author) ? 'Without Author' :$news->author) . '</h4></td></tr>';
                $output .= '<tr><td>contents:</td><td>' . (empty($news->contents) ? 'Empty Contents' : $news->contents) . '</td></tr>';
            }
        } else {
            $output .= '<tr><td><h3>Empty Newslist</h3></td></tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
        break;
    default:
        include_once('ISteamWebAPIUtil.php');
        $api = new \steampoweredAPI\ISteamWebAPIUtil();
        $responce = $api->GetSupportedAPIList();
        echo $responce;
        break;
}