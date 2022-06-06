<?php

session_start(); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career - Home Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Italianno&family=Overlock:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <div class="page-wrapper index-pg">
        <header class="header">
            <nav class="navbar">
                <div class="container navbar-content grid">
                    <a href="index.html" class="navbar-brand">
                        <img src="assets/images/career-logo.png" alt="site logo">
                    </a>

                    <div class="nav-and-site-links flex flex-col">
                        <ul class="social-links flex">
                            <li class="social-links-item">
                                <a href="#"><img src="assets/images/fb-logo.png" alt="facebook logo"></a>
                            </li>
                            <li class="social-links-item">
                                <a href="#"><img src="assets/images/insta-logo.png" alt="facebook logo"></a>
                            </li>
                            <li class="social-links-item">
                                <a href="#"><img src="assets/images/twitter-logo.png" alt="facebook logo"></a>
                            </li>
                            <li class="social-links-item">
                                <a href="#"><img src="assets/images/linkedin-logo.png" alt="facebook logo"></a>
                            </li>
                            <li class="social-links-item">
                                <a href="#"><img src="assets/images/pinterest-logo.png" alt="facebook logo"></a>
                            </li>
                        </ul>

                        <ul class="nav-links flex">
                            <li class="nav-item">
                                <a href="#" class="nav-link bg-blue text-upper">about us </a>
                            </li>
                            <li class="nav-item">
                                <a href="templates.html" class="nav-link bg-blue text-upper">templates </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link bg-blue text-upper">support </a>
                            </li>
                            
                            <?php if (isset($_SESSION['name']) && $_SESSION['name'] != null) : ?>
                                <li class="nav-item">
                                <a href="profile.php" class="nav-link bg-blue text-upper"><?php echo $_SESSION['name']; ?> Profile </a>
                            </li>
                                <li class="nav-item">
                                    <a href="logout.php" class="nav-link bg-blue">Logout </a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                <a href="register.php" class="nav-link bg-blue text-upper">register </a>
                            </li>
                                <li class="nav-item">
                                    <a href="login.php" class="nav-link bg-blue">Member login </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>