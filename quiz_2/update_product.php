<?php

$conn = new mysqli('localhost', 'root', '', 'products');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    
    $errors = [];
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($description)) $errors[] = "Description is required.";
    if (!is_numeric($price) || $price <= 0) $errors[] = "Price must be a positive number.";
    if (!is_numeric($stock) || $stock < 0) $errors[] = "Stock cannot be negative.";

    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ? WHERE id = ?");
        $stmt->bind_param("ssdii", $name, $description, $price, $stock, $id);
        if ($stmt->execute()) {
            echo "Product updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <form method="POST">
        Name: <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
        Description: <textarea name="description" required><?php echo $product['description']; ?></textarea><br>
        Price: <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br>
        Stock: <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required><br>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>