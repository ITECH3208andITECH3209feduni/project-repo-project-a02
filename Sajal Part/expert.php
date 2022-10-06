<?php

require('connection.php');
session_start();




$errors = array();

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        if ($username == "sajal.bhandari90"  && $password == "password") {
            $_SESSION['expert'] = "yes";
            header('location:request_cv.php');
        } else {
            header('location:expert.php?status=username or password doesnot match!!');
        }
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
        <a href="#" class="pg-nvg-text text-upper">Admin Login</a>
    </div>
</div>

<div class="container-fluid mb-5">
    <div class="row d-flex justify-content-center align-items-center m-0">
        <div class="login_oueter">
            <div class="col-md-12 logo_outer d-flex justify-content-center">
                <img src="assets/images/login-user-icon.png" alt="user icon">
            </div>

            <?php if (isset($errors) && count($errors) > 0) : ?>
                <?php foreach ($errors as $error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

            <?php
            if (isset($_GET['status'])) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo  $_GET['status']; ?>
                </div>

            <?php

            }
            ?>
            <form action="" method="post" id="login" autocomplete="off" class="bg-light border p-3">
                <div class="form-row">
                    <h4 class="title my-3">Login as Expert</h4>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input name="username" type="text" value="" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                                <span class="input-group-text" onclick="password_show_hide();">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="loginregister-button  d-flex justify-content-center flex-column text-center">
                            <button class="btn btn-lg btn-primary" type="submit" name="submit" name="signin">Login</button>


                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php
include('layout/footer.php');
?>