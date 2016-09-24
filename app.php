<?php
ini_set('memory_limit','1024M');
error_reporting(E_ALL);
define("DS",DIRECTORY_SEPARATOR);
include_directory(__DIR__.DS.'lib'.DS);
include_directory(__DIR__.DS.'model'.DS.'class'.DS);
include_directory(__DIR__.DS.'model'.DS);

function include_directory($directory){
    foreach (glob($directory."*.php") as $filename)
    {
        include $filename;
    }
}

unset($config);
global $config;
$config = Config::GetInstance();

