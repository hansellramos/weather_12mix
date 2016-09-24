<?php

/**
 * Created by PhpStorm.
 * User: hansellramos
 * Date: 9/23/16
 * Time: 10:06 AM
 */
class City{

    private $_id, $name, $country, $coord;

    /**
     * City constructor.
     * @param $_id
     * @param $name
     * @param $country
     * @param $coord
     */
    public function __construct($_id, $name, $country, $coord)
    {
        $this->_id = $_id;
        $this->name = $name;
        $this->country = $country;
        $this->coord = $coord;
    }

    public function __get($name)
    {
        if($name=='_id') return $this->_id;
        else if($name=='name') return $this->name;
        else if($name=='country') return $this->country;
        else if($name=='coord') return $this->coord;
        else null;
    }

    public function __set($name, $value)
    {
        if($name=='_id')  $this->_id = $value;
        else if($name=='name') $this->name = $value;
        else if($name=='country') $this->country = $value;
        else if($name=='coord') $this->coord = $value;
        return $this;
    }

    public function __toString()
    {
        if(!empty($this->country)) return "{$this->name}, $this->country";
        else return "{$this->name}";
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return array("_id"=>$this->_id, "name"=>$this->name, "country"=>$this->country, "coord"=>$this->coord);
    }
}