<?php

/**
 * Created by PhpStorm.
 * User: hansellramos
 * Date: 9/23/16
 * Time: 7:46 PM
 */
class JsonEncoder
{

    public static function encodeArray($array){
        $result = array();
        foreach ($array as $item) {
            $result[] = $item->jsonSerialize();
        }
        return json_encode($result);
    }

    public static function encodeObject($object){
        return json_encode($object->jsonSerialize());
    }

}