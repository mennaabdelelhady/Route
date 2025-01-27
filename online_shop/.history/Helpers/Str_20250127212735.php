<?php

Class Str{
    public static function limit($string){
        if(strlen($string) > 100){
            return substr($string, 0, $limit) . '...';
    }
}