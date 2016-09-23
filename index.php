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
}

Template::show_template($template,$template_vars);
