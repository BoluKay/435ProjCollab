<?php
include 'header.php';

session_start();
require 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate Input
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $signup_error = "Invalid email format.";
    } elseif (strlen($password) < 10 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $signup_error = "Password must be at least 10 characters, with one uppercase letter and one number.";
    } else {
        // Check for Duplicate Username or Email
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);
        if ($stmt->rowCount() > 0) {
            $signup_error = "Username or email already exists.";
        } else {
            // Hash Password and Insert
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->execute([
                'username' => $username,
                'email' => $email,
                'password' => $hashed_password
            ]);

            // Redirect to Login
            header("Location: login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>
    <div class="top-bar">
        <div class="contact-info">
            <div class="address">
                <i class="fa fa-location-arrow"></i> 4901 Evergreen Rd, Dearborn MI 48126
            </div>
            <div class="email">
                <i class="fa fa-envelope"></i> support@projectmentalhealth.com
            </div>
            <div class="phone">
                <i class="fa fa-phone"></i> +1 (764) 456-9503
            </div>
        </div>
    </div>

    <div class="top-bar-container">
            <div class="logo-container">
                <i class="fa-solid fa-heart-pulse icon"></i>
                <p class="mental-health">مشروع الصحة العقلية</p>
            </div>
                       
            <nav class="navigation-bar">
                <h2><a href="index.html">بيت</a></h2> 
            </nav>
                       
        </div>


    <div class="auth-container">
        <h2>يسجل</h2>
        <?php if (isset($signup_error)): ?>
            <p class="error"><?php echo $signup_error; ?></p>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <label for="username">اسم المستخدم</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">بريد إلكتروني</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">كلمة المرور</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">يسجل</button>
        </form>
        <p>مسجلة بالفعل؟ <a href="login.php">تسجيل الدخول هنا</a></p>
    </div>

    <footer class="dashboard-footer">
      <p>&copy; 2024 مشروع الصحة النفسية. جميع الحقوق محفوظة.</p>
    </footer>
</body>
</html>
