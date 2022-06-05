<?php

require('connection.php');
session_start(); 



if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);

    $select = " SELECT * FROM user where email = '$email' && password = '$pass' ";

    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header('location:profile.php');
    } else {
        header('location:login.php?status=username or password doesnot match!!');
    }
}
include('layout/header.php');
?>


<div class="page-navigate">
    <div class="page-navigate-container flex">
        <a href="#" class="pg-nvg-home-icon">
            <img src="assets/images/home-icon.png" alt="home icon">
        </a>
        <a href="#" class="pg-nvg-right-arrow-icon">
            <img src="assets/images/double-arrow-right.png" alt="double right arrow icon">
        </a>
        <a href="#" class="pg-nvg-text text-upper">Member Login</a>
    </div>
</div>

<main class="login-pg">
    <section class="templates-section">

        <div class="container">
            <form class="login-form flex flex-c flex-col" action="" method="post">
                <?php
                if (isset($_GET['status'])) {
                    echo '<span class="error-msg">' . $_GET['status'] . '</span>';
                }
                ?>
                <img src="assets/images/login-user-icon.png" alt="" class="top-user-icon">
                <div class="form-elem flex bg-grey">
                    <div class="form-elem-icon">
                        <img src="assets/images/user-icon.png" alt="user icon">
                    </div>
                    <input type="text" name="email" class="form-control" placeholder="username" required>
                </div>

                <div class="form-elem flex bg-grey">
                    <div class="form-elem-icon">
                        <img src="assets/images/lock-icon.png" alt="user icon">
                    </div>
                    <input type="text" name="password" class="form-control" placeholder="password" required>
                </div>

                <button type="submit" name="submit" class="form-btn login-btn">Login now</button>
                <span class="form-text">Not a member?</span>
                <a href="register.php" class="form-btn register-btn flex flex-c">Register Yourself</a>
            </form>
        </div>
    </section>
</main>

<?php
include('layout/footer.php');
?>