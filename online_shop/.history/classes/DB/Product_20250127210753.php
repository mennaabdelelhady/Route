<?php


class Product extends MySql{
    public function getAllProducts(){
        $sql = "SELECT * FROM products";
        $result = $this->connect()->query($sql);
        $products = [];
        while($row = $result->fetch_assoc()){
            $products[] = $row;
        }
        return $products;
    }

    public function getOneProduct($id){
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $this->connect()->query($sql);
        $products = [];
        while($row = $result->fetch_assoc()){
            $products[] = $row;
        }
        return $products;
    }

    public function addProduct($name, $price, $description,$image){
        $sql = "INSERT INTO products (name, price, description) VALUES ('$name', $price, '$description','$image')";
        $result =$this->connect()->query($sql);

        if($result){
            return true;
        }else{
            return false;
        }

    }
}