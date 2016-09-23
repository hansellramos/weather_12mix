<?php

/**
 * Created by PhpStorm.
 * User: hansellramos
 * Date: 9/23/16
 * Time: 11:41 AM
 */
class City_model
{
    private $cities = [];

    public function findByName($name){
        $this->loadCities();
        $results = [];
        foreach($this->cities as $city){
            if(strpos(strtoupper($city->name),strtoupper($name))===0){
                $results[] = new City(
                    $city->_id,
                    $city->name,
                    $city->country,
                    array(
                        'lon'=>$city->coord->lon,
                        'lat'=>$city->coord->lat
                    )
                );
            }
        }
        return $results;
    }

    public function findById($id){
        $this->loadCities();
        $result = false;
        foreach($this->cities as $city){
            if($city->_id==$id){
                $result = new City(
                    $city->_id,
                    $city->name,
                    $city->country,
                    array(
                        'lon'=>$city->coord->lon,
                        'lat'=>$city->coord->lat
                    )
                );
            }
        }
        return $result;
    }

    private function loadCities(){
        $citiesFile = dirname(__DIR__) . DS . 'data' . DS . 'city.list.json';
        $cities = file_get_contents($citiesFile);
        $cities = str_replace("}\n{", "},{", $cities);
        $cities = "[$cities]";
        $this->cities = json_decode($cities);
        $_SESSION['_cities'] = $this->cities;
    }

}