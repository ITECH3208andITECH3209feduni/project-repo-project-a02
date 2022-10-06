<?php
$fb_url = "https://www.facebook.com/";
$insta_url = "https://www.instagram.com/";
$twitter_url = "https://twitter.com/";
$linkedin_url = "https://www.linkedin.com/feed/";
$pintrest_url = "https://www.pinterest.com/";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career - Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Italianno&family=Overlock:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .tmp-banner{
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("assets/images/main_banner.jpg") center/cover no-repeat;
            min-height: 70vh;
            background-attachment: fixed;
        }
        .tmp-banner-title{
            font-weight: 600;
            letter-spacing: 1px;
        }
        .tmp-banner-text{
            font-weight: 300;
            opacity: 0.8;
            line-height: 1.8;
        }

        /* ###### cv page ##### */

        .cv-pg {
            font-family: var(--font-roboto);
        }

        .cv-pg .sec-text {
            color: var(--dark-color);
        }

        .cv-pg .page-section {
            padding: 10px 0;
            border-bottom: 1.5px solid var(--light-dark-color);
        }

        .cv-pg .page-section.pg-sec-one {
            grid-template-columns: auto 150px;
        }
        .cv-pg .pg-sec-one-l h2 {
            font-size: 32px;
            font-weight: 500;
        }
        .cv-pg .pg-sec-one-l h5 {
            font-size: 17px;
            font-weight: 500;
        }

        .cv-pg .pg-sec-one-r {
            height: 100px;
            width: 100px;
            overflow: hidden;
            border-radius: 50%;
        }

        .cv-pg .pg-sec-two-l .sec-item {
            margin-bottom: 2px;
        }

        .cv-pg .pg-sec-two-l .sec-item-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            /* margin-right: 15px; */
            font-size: 11px;
        }

        .cv-pg .page-section .sec-title {
            font-family: var(--font-lora);
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .cv-pg .page-section .sec-text {
            font-size: 15px;
            line-height: 1.4;
        }

        .cv-pg .pg-sec-two {
            grid-template-columns: 40% 60%;
        }

        .cv-pg .pg-sec-two>div {
            padding: 0 25px;
        }

        .cv-pg .pg-sec-two-l {
            border-right: 2px solid rgba(0, 0, 0, 0.25);
            padding-left: 0 !important;
        }

        .cv-pg .pg-sec-three {
            grid-template-columns: 40% 60%;
        }

        .cv-pg .pg-sec-three>div {
            padding: 0 25px;
        }

        .cv-pg .sec-item .sec-list {
            list-style-type: disc;
            margin-left: 17px;
        }

        .cv-pg .border-bottom {
            border-bottom: 2px solid rgba(0, 0, 0, 0.25);
            padding: 15px 0;
        }

        .cv-pg .sec-item-sub-title {
            text-transform: capitalize;
            margin-bottom: 3px;
        }

        .cv-pg .sec-text {
            margin-bottom: 6px;
        }
    </style>
</head>
<body>
    <div class="page-wrapper index-pg">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container">
                    <a href="index.php" class="navbar-brand">
                        <img src="assets/images/career-logo.png" alt="site logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex justify-content-center align-items-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link text-upper">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="siteabout.php" class="nav-link text-upper">about us </a>
                            </li>
                            <li class="nav-item">
                                <a href="templates.php" class="nav-link text-upper">templates </a>
                            </li>
                            <li class="nav-item">
                                <a href="support.php" class="nav-link text-upper">support </a>
                            </li>

                            <?php if (isset($_SESSION['name']) && $_SESSION['name'] != null) : ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" role="button" data-bs-toggle="dropdown" style="background-color: #8cdef7;">

                                        <?php if (isset($_SESSION['profile_pic']) && $_SESSION['profile_pic'] != null) : ?>
                                            <img class="rounded-circle" style="height: 30px;width:30px;margin-bottom:0px;" src="<?php echo $_SESSION['profile_pic']; ?>">
                                        <?php endif; ?>
                                        Profile
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-light">
                                        <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    </ul>
                                </li>

                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="login.php" class="nav-link">Login </a>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <ul class="social-links flex align-items-center mb-0">
                            <li class="social-links-item">
                                <a target="_blank" href="<?php echo $fb_url; ?>"><img src="assets/images/fb-logo.png" alt="facebook logo"></a>
                            </li>
                            <li class="social-links-item">
                                <a target="_blank" href="<?php echo $insta_url; ?>"><img src="assets/images/insta-logo.png" alt="Insta Logo"></a>
                            </li>
                            <li class="social-links-item">
                                <a target="_blank" href="<?php echo $twitter_url; ?>"><img src="assets/images/twitter-logo.png" alt="twitter logo"></a>
                            </li>
                            <li class="social-links-item">
                                <a target="_blank" href="<?php echo $linkedin_url; ?>"><img src="assets/images/linkedin-logo.png" alt="linkendin logo"></a>
                            </li>
                            <li class="social-links-item">
                                <a target="_blank" href="<?php echo $pintrest_url; ?>"><img src="assets/images/pinterest-logo.png" alt="pinterest logo"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>