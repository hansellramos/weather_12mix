<?php

/**
 * Created by PhpStorm.
 * User: hansellramos
 * Date: 9/23/16
 * Time: 2:10 PM
 */
class Weather
{

    public $starttimme, $endtime, $cloudiness, $wind, $temp, $temp_min, $temp_max;

    /**
     * Weather constructor.
     * @param $starttimme
     * @param $endtime
     * @param $cloudiness
     * @param $wind
     * @param $temp
     * @param $temp_min
     * @param $temp_max
     */
    public function __construct($starttimme, $endtime, $cloudiness, $wind, $temp, $temp_min, $temp_max)
    {
        $this->starttimme = $starttimme;
        $this->endtime = $endtime;
        $this->cloudiness = $cloudiness;
        $this->wind = $wind;
        $this->temp = $temp;
        $this->temp_min = $temp_min;
        $this->temp_max = $temp_max;
    }

    public function __get($name)
    {
        if($name=='starttime') return $this->starttimme;
        else if($name=='endtime') return $this->endtime;
        else if($name=='cloudiness') return $this->cloudiness;
        else if($name=='wind') return $this->wind;
        else if($name=='temp') return $this->temp;
        else if($name=='temp_min') return $this->temp_min;
        else if($name=='temp_max') return $this->temp_max;
        else null;
    }

    public function __set($name, $value)
    {
        if($name=='starttime') $this->starttimme = $value;
        else if($name=='endtime') $this->endtime = $value;
        else if($name=='cloudiness') $this->cloudiness = $value;
        else if($name=='wind') $this->wind = $value;
        else if($name=='temp') $this->temp = $value;
        else if($name=='temp_min') $this->temp_min = $value;
        else if($name=='temp_max') $this->temp_max = $value;
        return $this;
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
        return array('starttime'=>$this->starttimme, 'endtime'=>$this->endtime, 'cloudiness'=>$this->cloudiness, 'wind'=>$this->wind, 'temp'=>$this->temp, 'temp_min'=>$this->temp_min, 'temp_max'=>$this->temp_max);
    }
}