<?php
namespace classes\Helpers;
Class Str{
    public function limit($str){
        if(strlen($string) > 100){
            return substr($str, 0, $limit) . '...';
    }
    return $str;
    }
}