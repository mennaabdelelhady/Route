<?php

//interface fly();


abstract class Shape{
    abstract public function getArea();
}
Class Rectangle extends Shape{
    public $width;
    public $height;

    public function setWidth($width){
        $this->width = $width;
    }

    public function setHeight($height){
        $this->height = $height;
    }
    public function getArea(){
        return $this->width * $this->height;
    }

}
Class Square extends Shape{
    public $width;
    public function _construct($width){
        $this->width = $width;
    }
}
function printArea(Rectangle $rectangle){
    $rectangle->setWidth(4);
    $rectangle->setHeight(5);
    echo $rectangle->getArea();

}
$rectangle = new Rectangle;

printArea($rectangle);