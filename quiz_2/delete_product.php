<?php
$conn = new mysqli('localhost', 'root', '', 'products');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$conn->query("DELETE FROM products WHERE id = $id");

echo "Product deleted successfully!";
header("Location: display_products.php"); 
?>