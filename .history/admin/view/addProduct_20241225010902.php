<?php

include "../view/header.php";

include "../view/sidebar.php";
include "../view/navbar.php";
include "../../connection.php";




?>

      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">


              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>
                <form method="POST" action="addProduct.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="img" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="addProduct" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <?php
if (isset($_POST['addProduct'])) {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Save image to a folder
    $upload_dir = "../../uploads/";
    move_uploaded_file($image_tmp, $upload_dir . $image);

    // Insert product into the database
    $query = "INSERT INTO products (name, category_id, price, image) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sids", $product_name, $category_id, $price, $image);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'>Product added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error adding product. Please try again.</div>";
    }
}
?>

<?php include "../view/footer.php"; ?>
2. Display Products Code
Product List for Customers
Create a page shop.php to display products:

php
Copy code
<?php
include "header.php";
include "navbar.php";
include "../../dbConnection.php"; // Database connection
?>

<div class="container mt-5">
    <h3 class="text-center">Shop</h3>
    <div class="row">
        <?php
        $query = "SELECT products.id, products.name, products.price, products.image, categories.name AS category 
                  FROM products 
                  INNER JOIN categories ON products.category_id = categories.id";
        $result = $connection->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "
            <div class='col-md-4'>
                <div class='card'>
                    <img src='../../uploads/{$row['image']}' class='card-img-top' alt='{$row['name']}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['name']}</h5>
                        <p class='card-text'>Category: {$row['category']}</p>
                        <p class='card-text'>Price: {$row['price']} USD</p>
                        <form method='POST' action='cart.php'>
                            <input type='hidden' name='product_id' value='{$row['id']}'>
                            <button type='submit' name='add_to_cart' class='btn btn-primary'>Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</div>


<?php 
include "../view/footer.php";
 ?>