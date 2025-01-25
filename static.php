<?php

Class Test{
    public $name ='Menna';
    public static $brand = "BMW";

    
    public static function welcome(){
        echo "welcome".$this->$brand;
    }
}

class DataBase{
    public static $dbName = "mysql";
    public static $dbHost = "localhost";
    public static $dbUserName = "root";
    public static function get_connection(){
        echo "connected to".self::$db;
        echo Database::$dbHost.".".Database::$dbName.".".Database::$dbUserName;
    }
}
Database::get_connection();