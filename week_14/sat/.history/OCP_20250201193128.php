<?php

Class Accounting{
    public $price;
    public function getProductPrice(){
        if($type =='product'){
            return $this->price;
        }else if($type =='taxproduct'){
            return $this->price + ($this->price * 0.05);
        }
    }
}
$acc = new Accounting;
$acc->price = 100;
echo $acc->getProductPrice();