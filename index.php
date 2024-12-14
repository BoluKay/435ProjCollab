<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Mental Health</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ribeye&family=Roboto:wght@400;700&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        .contact-info,
        .address,
        .email,
        .phone {
            display: inline-block;
            margin: 18px;
        }
    </style>
</head>
<body>
    <header>
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

        <div class="header">
            <div class="top-bar-container">
                <div class="left-bar">
                    <div class="logo-container">
                        <i class="fa-solid fa-heart-pulse icon"></i>
                        <p class="mental-health">PROJECT MENTAL HEALTH</p>
                    </div>
                    <nav>
                         <ul>
                             <?php if ($isLoggedIn): ?>
                                  <!-- Dashboard button for logged-in users -->
                                     <li id="dashboard"><a href="dashboard.php" class="nav-button">DASHBOARD</a></li>
                             <?php else: ?>
                                   <!-- Sign Up / Sign In button for non-logged-in users -->
                                   <li id="signup-signin"><a href="login.php" class="nav-button">SIGN UP / SIGN IN</a></li>
                                 <?php endif; ?>
                            <!-- Resource Center button -->
                               <li id="resource-center"><a href="resource-center.html" class="nav-button">RESOURCE CENTER</a></li>
                            </ul>
                    </nav>

                </div>
                <div class="right-bar">
                    <button class="chat-btn" id="chat-button">Questions? Chat with us!</button>
                    <i class="fa-solid fa-robot robicon"></i>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="welcome-section">
            <div class="welcome-overlay">
                <h1 id="welcome-text">WELCOME!</h1>
                <p id="description-text">Find Mental Health and Special Education Support in Your Preferred Language</p>
                <div>
                    <p class="select" id="select-language-text">SELECT LANGUAGE</p>
                </div>
                <div class="language-buttons">
                    <button id="english-button">English</button>
                    <button id="arabic-button">Arabic</button>
                </div>
            </div>
            <div class="welcome-image">
                <img src="aafsc-75.jpg" alt="Mother and child">
            </div>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>
