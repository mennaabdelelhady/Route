<?php
include "header.php";
include "navbar.php";
include "connection.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // التحقق من المدخلات
    if (!empty($email) && !empty($password)) {
        // التحقق من وجود المستخدم في قاعدة البيانات
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];

            // التوجيه بناءً على نوع المستخدم
            if ($user['role'] === 'admin') {
                header("Location: admin/view/layout.php");
            } else {
                header("Location: shop.php");
            }
            exit();
        } else {
            echo "<div class='alert alert-danger'>Invalid email or password</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Please fill in all fields</div>";
    }
}
?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">
    <h3 class="card-title text-left mb-3">Login</h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" class="form-control p_input" required>
        </div>
        <div class="form-group">
            <label>Password *</label>
            <input type="password" name="password" class="form-control p_input" required>
        </div>
        <div class="form-group d-flex align-items-center justify-content-between">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Remember me 
                </label>
            </div>
            <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
        </div>
        <div class="text-center">
            <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
        </div>
        <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
    </form>
</div>

<?php include "footer.php"; ?>
