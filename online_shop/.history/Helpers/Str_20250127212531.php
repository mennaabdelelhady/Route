<?php

Class Str{
    public static function limit($string, $limit){
        return substr($string, 0, $limit);
    }
}