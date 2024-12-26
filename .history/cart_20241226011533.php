<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<section id="page-header" class="about-header"> 
    <h2>#Cart</h2>
    <p>Let's see what you have.</p>
</section>

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Description</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Subtotal</td>
                <td>Remove</td>
            </tr>
        </thead>
   
        <tbody>
            <?php
            session_start();
            include "../connection.php";

            $total = 0;

            // Check if cart is not empty
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $key => $item) {
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;

                    echo "
                    <tr>
                        <td><img src='../../uploads/{$item['image']}' alt='{$item['name']}' width='50'></td>
                        <td>{$item['name']}</td>
                        <td>{$item['description']}</td>
                        <td>
                            <form method='POST' action='updateCart.php'>
                                <input type='hidden' name='product_id' value='{$item['id']}'>
                                <input type='number' name='quantity' value='{$item['quantity']}' min='1' class='form-control' style='width: 60px;'>
                                <button type='submit' name='update_cart' class='btn btn-primary btn-sm'>Update</button>
                            </form>
                        </td>
                        <td>{$item['price']} USD</td>
                        <td>{$subtotal} USD</td>
                        <td>
                            <form method='POST' action='removeFromCart.php'>
                                <input type='hidden' name='product_id' value='{$item['id']}'>
                                <button type='submit' name='remove_from_cart' class='btn btn-danger btn-sm'>Remove</button>
                            </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>Your cart is empty!</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="text-right mt-3">
        <h4>Total: <?php echo $total; ?> USD</h4>
        <form method="POST" action="confirmOrder.php">
            <button type="submit" name="confirm_order" class="btn btn-success">Confirm Order</button>
        </form>
    </div>
</section>

<?php include "footer.php"; ?>
