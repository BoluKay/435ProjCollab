<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'db.php'; // Include the database connection
?>


<?php
session_start();
require 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profile_picture = $_FILES['profile-picture'];

    // Input Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }
    if (strlen($password) < 10 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        die("Password must be at least 10 characters, with at least one uppercase letter and one number.");
    }

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);
    if ($stmt->rowCount() > 0) {
        die("Username or email already exists.");
    }

    // Save Profile Picture
    $picture_name = null;
    if ($profile_picture && $profile_picture['tmp_name']) {
        $picture_name = uniqid() . '-' . $profile_picture['name'];
        move_uploaded_file($profile_picture['tmp_name'], "uploads/$picture_name");
    }

    // Hash the Password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the User into the Database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, profile_picture) VALUES (:username, :email, :password, :profile_picture)");
    $stmt->execute([
        'username' => $username,
        'email' => $email,
        'password' => $hashed_password,
        'profile_picture' => $picture_name
    ]);

    // Set Session Variables and Redirect
    $_SESSION['username'] = $username;
    $_SESSION['profile_picture'] = $picture_name;
    header("Location: dashboard.php");
    exit();
}
?>

