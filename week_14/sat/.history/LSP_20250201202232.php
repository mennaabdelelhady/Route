<?php

//interface fly();

Class Rectangle{
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
Class Square extends Rectangle{
    public function setSide($side){
        $this->width = $this->height = $side;

    }

    public function setWidth($width){
        $this->width = $width;
        $this->height = $width;
    }
    public function setHeight($height){
        $this->height = $height;
        $this->width = $height;
    }
}
function printArea(Rectangle $rectangle){
    $rectangle->setWidth(4);
    $rectangle->setHeight(5);
    echo $rectangle->getArea();

}
$rectangle = new Rectangle;

printArea($rectangle);