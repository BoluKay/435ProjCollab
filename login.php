<?php
include 'header.php';
session_start();
require 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch User by Email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify Password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id']; // Assuming 'id' is the primary key in the users table
        $_SESSION['username'] = $user['username']; // Use username for display only

        header("Location: dashboard.php");
        exit();
    } else {
        $login_error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                <h2><a href="index.html"> بيت </a></h2> 
            </nav>
                       
    </div>

    <div class="auth-container">
        <h2>تسجيل الدخول</h2>
        <?php if (isset($login_error)): ?>
            <p class="error"><?php echo $login_error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="email">بريد إلكتروني</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">كلمة المرور</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">تسجيل الدخول</button>
        </form>
        <p>ليس لديك حساب؟ <a href="register.php">سجل هنا.</a></p>
    </div>
    
    <footer>
           <p>&copy; 2024 مشروع الصحة النفسية. جميع الحقوق محفوظة.</p>
    </footer>
</body>
</html>
