<?php 

require_once 'classes/DB/Product.php';

$product = new Product();
echo "<pre>";
print_r($product->getAllProducts());