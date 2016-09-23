<?php
/**
 * Created by PhpStorm.
 * User: hansellramos
 * Date: 9/23/16
 * Time: 10:03 AM
 */

require_once 'app.php';
global /** @var Config $config */
$config;
require_once 'view/Template.php';

$template = 'index';
$template_vars = [
      'query'=>''
    , 'search_results'=>''
    , 'google_maps_url_patern'=>$config->google_maps_url_patern
    , 'google_maps_default_zoom'=>$config->google_maps_default_zoom
];

if(isset($_REQUEST['city'])){
    $city = $_REQUEST['city'];
    $template_vars['query'] = $city;
    $city_model = new City_model();
    $search_results = $city_model->findByName($city);
    $template_vars['search_results'] = json_encode($search_results);
}else if(isset($_REQUEST['weather'])){
    $city_id = $_REQUEST['weather'];
    $city_model = new City_model();
    $city = $city_model->findById($city_id);
    $template_vars['city_name'] = $city->name;
    $template_vars['city'] = json_encode($city);
    $template_vars['city_country'] = $city->country;
    $weather_model = new Weather_model();
    $weather = $weather_model->getWeather($city_id);
    $today = array_keys($weather)[0];
    $weather_today = $weather[$today];
    $template_vars['weathers'] = json_encode($weather);
    $template_vars['weather_today'] = json_encode($weather_today);
}

Template::show_template($template,$template_vars);
