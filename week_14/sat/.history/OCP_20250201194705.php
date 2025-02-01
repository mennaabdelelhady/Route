<?php

Class Accounting{
    public $price;
    abstract public function getProductPrice(){
        if($type =='product'){
            return $this->price;
        }else if($type =='taxproduct'){
            return $this->price + ($this->price * 0.05);
        }
    }
}
class product extends accounting{
    public function getProductPrice(){
            return $this->price;
    }
}
$acc = new Accounting;
$acc->price = 100;
echo $acc->getProductPrice();