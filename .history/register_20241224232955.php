<?php
include "header.php";
include "navbar.php";
include "connection.php";

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // التحقق من صحة الإدخال
    if (!empty($name) && !empty($email) && !empty($password) && !empty($confirm_password)) {
        if ($password === $confirm_password) {
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
                $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'user')";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("sss", $name, $email, $hashed_password);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Registration successful! <a href='login.php'>Login here</a>.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error occurred while registering. Please try again.</div>";
                }
            }
        } else {
            echo "<div class='alert alert-danger'>Passwords do not match. Please try again.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>All fields are required. Please fill out the form completely.</div>";
    }
}
?>

<div class="card-body px-5 py-5" style="background-color: lightgray;">
    <h3 class="card-title text-left mb-3">Register</h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" class="form-control p_input" required>
        </div>
        <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" class="form-control p_input" required>
        </div>
        <div class="form-group">
            <label>Password *</label>
            <input type="password" name="password" class="form-control p_input" required>
        </div>
        <div class="form-group">
            <label>Confirm Password *</label>
            <input type="password" name="confirm_password" class="form-control p_input" required>
        </div>
        <div class="text-center">
            <button type="submit" name="register" class="btn btn-primary btn-block enter-btn">Register</button>
        </div>
        <p class="sign-up">Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div>

<?php include "footer.php"; ?>
