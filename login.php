<?php
session_start();
require 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch User by Email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify Password and Set Session
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['profile_picture'] = $user['profile_picture'];
        header("Location: dashboard.php");
        exit();
    } else {
        die("Invalid email or password.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up / Sign In</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <i class="fa-solid fa-heart-pulse icon"></i>
            <p class="mental-health">PROJECT MENTAL HEALTH</p>
        </div>
    </header>

    <main class="auth-section">
        <!-- Sign In Form -->
        <section>
            <h2>Sign In</h2>
            <form action="login.php" method="POST">
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="email" required>
                
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" required>
                
                <button type="submit">Sign In</button>
            </form>
        </section>

        <!-- Sign Up Form -->
        <section>
            <h2>Sign Up</h2>
            <form action="register.php" method="POST" enctype="multipart/form-data">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <label for="profile-picture">Profile Picture:</label>
                <input type="file" id="profile-picture" name="profile-picture" accept="image/*" required>
                
                <button type="submit">Sign Up</button>
            </form>
        </section>
    </main>
</body>
</html>

