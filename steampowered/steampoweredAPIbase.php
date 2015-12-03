<?php
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 01.12.2015
 * Time: 23:52
 */

namespace steampoweredAPI;
include_once('SteampoweredAPIinterface.php');

abstract class SteampoweredAPIbase implements SteampoweredAPIinterface {
    //http://api.steampowered.com/<interface>/<method>/<method_version>/
    var $url = "http://api.steampowered.com";
    var $interface;
    var $method;
    var $method_version = 1;
    var $parameters = array();

    /**
     * steampoweredAPIbase constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    protected function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * @param string $interface
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return int
     */
    public function getMethodVersion()
    {
        return $this->method_version;
    }

    /**
     * @param int $method_version
     */
    public function setMethodVersion($method_version)
    {
        $this->method_version = $method_version;
    }

    public function getRequestString()
    {
        $requestString = $this->url . "/" . $this->interface . "/" . $this->method . "/v000" . $this->method_version;
        if (!empty($this->parameters)) {
            $requestString .= "?";
            foreach ($this->parameters as $key => $val) {
                if (!empty($val)) {
                    $requestString .= $key . "=" . $val . '&';
                }
            }
        }
        return $requestString;
    }

    function doRequest()
    {
        $reference = $this->getRequestString();
        $ch = curl_init($reference);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}