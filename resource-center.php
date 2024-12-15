<?php
session_start();
$isLoggedIn = isset($_SESSION['username']); // Check if the user is logged in
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>مركز الموارد</title>
    <style>
        /* Resource Box Styling */
        .resource-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .resource-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
        .resource-box a {
            text-decoration: none;
            color: #007bff;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .resource-box a:hover {
            color: #0056b3;
        }
        .resource-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <header>
        <div class="top-bar">
            <div class="contact-info">
                <div class="address">
                    <i class="fa fa-location-arrow"></i> 4901 طريق إيفرجرين، ديربورن، ميشيغان 48126
                </div>
                <div class="email">
                    <i class="fa fa-envelope"></i> support@projectmentalhealth.com
                </div>
                <div class="phone">
                    <i class="fa fa-phone"></i> +1 (764) 456-9503
                </div>
            </div>
        </div>

        <!-- Navigation Bar -->
        <div class="top-bar-container">
            <div class="logo-container">
                <i class="fa-solid fa-heart-pulse icon"></i>
                <p class="mental-health">مشروع الصحة النفسية</p>
            </div>

            <nav class="navigation-bar">
                <ul>
                    <li><a href="index.php">الرئيسية</a></li>
                    <?php if ($isLoggedIn): ?>
                        <!-- Dashboard Button for Logged-in Users -->
                        <li><a href="dashboard.php">لوحة القيادة</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <section class="resource-center-section">
            <div class="resources-heading">
                <h1 id="resource-center-title">مركز الموارد</h1>
                <p id="resource-center-description">
                    ابحث عن موارد للصحة النفسية والعافية أدناه. انقر على موضوع لمعرفة المزيد.
                </p>
            </div>
            <div class="resource-grid">
                <div class="resource-box">
                    <a href="adhd.html">اضطراب نقص الانتباه وفرط النشاط (ADHD)</a>
                </div>
                <div class="resource-box">
                    <a href="anxiety.html">القلق واضطراب القلق العام (GAD)</a>
                </div>
                <div class="resource-box">
                    <a href="bereavement.html">التعامل مع الفقدان (الحزن)</a>
                </div>
                <div class="resource-box">
                    <a href="adult-depression.html">الاكتئاب لدى البالغين</a>
                </div>
                <div class="resource-box">
                    <a href="schizophrenia.html">الفصام</a>
                </div>
                <div class="resource-box">
                    <a href="resources_list.php">الذهان في مرحلة الطفولة</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 مشروع الصحة النفسية. جميع الحقوق محفوظة.</p>
    </footer>
</body>
</html>
