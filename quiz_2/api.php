<?php
header("Content-Type: application/json");
$conn = new mysqli('localhost', 'root', '', 'products');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $result = $conn->query("SELECT * FROM products WHERE id = $id");
            $product = $result->fetch_assoc();
            echo json_encode($product);
        } else {
            $result = $conn->query("SELECT * FROM products");
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            echo json_encode($products);
        }
        break;

    case 'POST':
        $name = $input['name'];
        $description = $input['description'];
        $price = $input['price'];
        $stock = $input['stock'];

        $stmt = $conn->prepare("INSERT INTO products (name, description, price, stock) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $name, $description, $price, $stock);
        $stmt->execute();
        echo json_encode(["message" => "Product created"]);
        break;

    case 'PUT':
        $id = $input['id'];
        $name = $input['name'];
        $description = $input['description'];
        $price = $input['price'];
        $stock = $input['stock'];

        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ? WHERE id = ?");
        $stmt->bind_param("ssdii", $name, $description, $price, $stock, $id);
        $stmt->execute();
        echo json_encode(["message" => "Product updated"]);
        break;

    case 'DELETE':
        $id = $input['id'];
        $conn->query("DELETE FROM products WHERE id = $id");
        echo json_encode(["message" => "Product deleted"]);
        break;
}
?>