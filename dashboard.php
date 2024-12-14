<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not authenticated
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="dashboard-body">
    <header class="dashboard-header">
        <div class="header-container">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <nav>
                <ul>
                    <li><a href="profile.php">Account Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="dashboard-main">
        <!-- Search Bar -->
        <section class="search-section">
            <h2>Search for Resources</h2>
            <form action="resources.php" method="get">
                <input type="text" name="query" placeholder="Search resources..." required>
                <button type="submit">Search</button>
            </form>
        </section>

        <!-- Resource Recommendations -->
        <section class="recommendations-section">
            <h2>Recommended Resources</h2>
            <ul>
                <li><a href="resource1.php">Resource 1</a></li>
                <li><a href="resource2.php">Resource 2</a></li>
                <li><a href="resource3.php">Resource 3</a></li>
            </ul>
        </section>

        <!-- Quick Links -->
        <section class="quick-links-section">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="faqs.php">FAQs</a></li>
                <li><a href="support.php">Support</a></li>
                <li><a href="resources.php">Resources Page</a></li>
                <li><a href="chatbot.php">Chat with AI Chatbot</a></li>
            </ul>
        </section>
    </main>

    <footer class="dashboard-footer">
        <p>&copy; 2024 Project Mental Health. All Rights Reserved.</p>
    </footer>
</body>
</html>
