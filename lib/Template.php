<?php

/**
 * Created by PhpStorm.
 * User: hansellramos
 * Date: 9/23/16
 * Time: 11:22 AM
 */
class Template
{

    public static function show_template($template_name, $vars){
        $templates_dir = (dirname(__DIR__).DS.'view'.DS.'templates'.DS);
        ob_start();
        include "{$templates_dir}{$template_name}.html";
        $template = ob_get_clean();
        foreach($vars as $key => $value){
            $template = str_replace("{{$key}}",$value, $template);
        }
        echo $template;die;
    }

}