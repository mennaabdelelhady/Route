<?php
include "header.php";
include "navbar.php";
include "Connection.php";

if (isset($_POST['signup'])) {
    $username = trim($_POST['UserName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    // التحقق من صحة البيانات المدخلة
    if (!empty($username) && !empty($email) && !empty($password) && !empty($phone) && !empty($address)) {
        // التحقق من صحة رقم الهاتف باستخدام Regex
        $regex = "/^01[0,1,2,5][0-9]{8}$/";
        if (preg_match($regex, $phone)) {
            // التحقق إذا كان البريد الإلكتروني موجودًا مسبقًا
            $sql_check = "SELECT * FROM users WHERE email = ?";
            $stmt_check = $connection->prepare($sql_check);
            $stmt_check->bind_param("s", $email);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();

            if ($result_check->num_rows > 0) {
                echo "<div class='alert alert-danger'>Email already exists. Please try another one.</div>";
            } else {
                // تشفير كلمة المرور
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // إضافة المستخدم إلى قاعدة البيانات
                $sql = "INSERT INTO users (username, email, password, phone, address, role) VALUES (?, ?, ?, ?, ?, 'user')";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("sssss", $username, $email, $hashed_password, $phone, $address);

                if ($stmt->execute()) {
                    // إعادة توجيه المستخدم إلى صفحة المتجر
                    header("Location: shop.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Error occurred while registering. Please try again.</div>";
                }
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid phone number format. Please enter a valid number.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>All fields are required. Please fill out the form completely.</div>";
    }
}
?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">
    <h3 class="card-title text-left mb-3">Register</h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control p_input" name="name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control p_input" name="email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control p_input" name="password" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control p_input" name="phone" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control p_input" name="address" required>
        </div>
        <div class="text-center">
            <button type="submit" name="signup" class="btn btn-primary btn-block enter-btn">Signup</button>
        </div>
        <p class="sign-up text-center">Already have an Account? <a href="login.php">Login</a></p>
        <p class="terms">By creating an account you are accepting our <a href="#">Terms & Conditions</a></p>
    </form>
</div>

<?php include "footer.php"; ?>
