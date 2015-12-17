<?php
include_once("Unit.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 16.12.2015
 * Time: 19:15
 */
abstract class AbstractUnit implements Unit
{
    protected $id = null;
    protected $code = null;

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param null $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    public function __toString()
    {
        $output = __CLASS__ . ": { ";
        $output .= "id : " . $this->id;
        $output .= "; code : " . $this->code;
        $output .= " },";
        return $output;
    }
}