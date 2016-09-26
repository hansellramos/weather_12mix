<?php

/**
 * Created by PhpStorm.
 * User: hansellramos
 * Date: 9/23/16
 * Time: 1:59 PM
 */
class Weather_model
{

    public function getWeather($cityId){
        global /** @var Config $config */
        $config;
        $url = $config->weather_api_url;
        $url = str_replace("{appid}",$config->appid,$url);
        $url = str_replace("{city}",$cityId,$url);
        $result = file_get_contents($url);
        return $this->parse($result);
    }

    public function parse($string){
        $result = json_decode($string);
        $weathers = array();
        foreach($result->list as $weather){
            $weathers[] = $this->parseItem($weather);
        }
        return $this->gruopByDay($weathers);
    }

    public function parseItem($item){
        return  new Weather(
            $item->dt
            , $item->dt+(3600*3-1)
            //, date('Hi',$item->dt)
            , $item->clouds->all
            , $item->wind->speed
            , $item->main->temp
            , $item->main->temp_min
            , $item->main->temp_max
        );
    }

    public function gruopByDay($list){
        $items = array();
        foreach($list as $item){
            $date = date('Y-m-d',$item->starttime);
            $items[$date][] = $item;
;       }
        foreach($items as $date => $item){
            $items[] = array(
                'date'=>$date,
                'weathers'=>$item
            );
            unset($items[$date]);
        }
        return $items;
    }

}