<?php
namespace Classes/Helpers;
Class Str{
    public static function limit($str){
        if(strlen($string) > 100){
            return substr($str, 0, $limit) . '...';
    }
    return $str;
    }
}