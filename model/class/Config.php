<?php

/**
 * Created by PhpStorm.
 * User: hansellramos
 * Date: 9/23/16
 * Time: 10:48 AM
 */
class Config
{
    private $APPID
    , $weather_api_url
    , $google_maps_url_patern
    , $google_maps_default_zoom
    ;

    private function __construct()
    {
        $this->APPID = "063b9dcc94488665d845970cc92b5d39";
        $this->weather_api_url = "http://api.openweathermap.org/data/2.5/forecast?id={city}&mode=json&appid={appid}";
        $this->google_maps_default_zoom = 13;
        $this->google_maps_url_patern = "https://www.google.com.co/maps/@{lat},{lon},{zoom}z";
    }

    public static function GetInstance(){
        global $config;
        if($config==null) {
            return new Config();
        }else{
            return $config;
        }
    }

    public function __get($name)
    {
        if($name=="appid") return $this->APPID;
        else if($name=="weather_api_url") return $this->weather_api_url;
        else if($name=="google_maps_url_patern") return $this->google_maps_url_patern;
        else if($name=="google_maps_default_zoom") return $this->google_maps_default_zoom;
        else return "";
    }
}