<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirect to login page if not authenticated
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="dashboard-header">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <?php if ($_SESSION['profile_picture']): ?>
            <img src="uploads/<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Profile Picture" class="profile-picture">
        <?php endif; ?>
        <a href="logout.php" class="logout-button">Logout</a>
    </header>
    <main class="dashboard-main">
        <p>Your dashboard content goes here.</p>
        <ul>
            <li><a href="resources.html">View Resources</a></li>
            <li><a href="chatbot.html">Chat with AI</a></li>
        </ul>
    </main>
</body>
</html>
