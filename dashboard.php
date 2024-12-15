<?php
session_start();
if (!isset($_SESSION['userid'])) { // Use userid to check authentication
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
</head>
<body class="dashboard-body">
    <header class="dashboard-header">
        <div class="header-container">
            <h1>مرحباً, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1> <!-- Use username for display only -->
            <nav>
                <ul>
                    <li><a href="profile.php">إعدادات الحساب</a></li>
                    <li><a href="logout.php">تسجيل الخروج</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="dashboard-main">

        <!-- Search Bar 
        <section class="search-section">
            <h2>Search for Resources</h2>
            <form action="resources.php" method="get">
                <input type="text" name="query" placeholder="Search resources..." required>
                <button type="submit">Search</button>
            </form>
        </section> -->

        <!-- Resource Recommendations -->
        <section class="saved-section">
            <h2>الموارد المحفوظة</h2>
            <ul>
                <li><a href="resource1.php">المصدر 1</a></li>
                <li><a href="resource2.php">المصدر 2</a></li>
                <li><a href="resource3.php">المصدر 3</a></li>
            </ul>
        </section>

        <!-- Quick Links -->
        <section class="quick-links-section">
            <h2>روابط سريعة</h2>
            <ul>
                <li><a href="faqs.php">الأسئلة الشائعة</a></li>
                <li><a href="support.php">يدعم</a></li>
                <li><a href="resources.php">صفحة الموارد</a></li>
                <li><a href="chatbot.php">الدردشة مع AI Chatbot</a></li>
            </ul>
        </section>
    </main>

    <footer class="dashboard-footer">
        <p>&copy; 2024 مشروع الصحة النفسية. جميع الحقوق محفوظة.</p>
    </footer>
</body>
</html>
