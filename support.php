<?php
session_start();

$fullname    = "";
$message    = "";
$email    = "";
$errors = array();

// connect to the database

// REGISTER USER
if (isset($_POST['submit'])) {


    $fullname =  $_POST['fullname'];
    $email =  $_POST['email'];
    $message =  $_POST['message'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($fullname)) {
        array_push($errors, "Name is required");
    }

    if (empty($message)) {
        array_push($errors, "Message is required");
    }
    if (empty($email)) {
        array_push($errors, "Email Number is required");
    }


    $from = $email;
    $to = "sajal.bhandari90@gmail.com";
    $subject = "New Support mail form ". $fullname;
    $message = $message;
    $headers = "From:" . $from;
    if (mail($to, $subject, $message, $headers)) {
        header("Location:support.php?status=Thank you for your message. we will contact you soon");
    } else {
        array_push($errors, "Something went error!!!");
    }

    

    // if (count($errors) == 0) {
    //     if ($con->query($sql) === TRUE) {
    //         header("Location:login.php?status=User successfully registered");
    //     } else {
    //         array_push($errors, "Something went error!!!");
    //     }
    // }
}

include('layout/header.php')
?>

<div class="container">
    <div class="page-navigate">
        <div class="page-navigate-container flex">
            <a href="#" class="pg-nvg-home-icon">
                <img src="assets/images/home-icon.png" alt="home icon">
            </a>
            <a href="#" class="pg-nvg-right-arrow-icon">
                <img src="assets/images/double-arrow-right.png" alt="double right arrow icon">
            </a>
            <a href="#" class="pg-nvg-text text-upper">Support</a>
        </div>
    </div>
</div>
<main class="templates-pg">
    <section class="templates-section">
        <div class="container py-5">
            <div class="pg-title">Support Us</div>
            <p class="pg-text">
                24/7 service. 
                We will help u resolve any errors that u encounter in our website.
                Please fill the form below if u have any quries related to  the website.
            </p>

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
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h3>Contact Us</h3>
                        <form action="" method="post">
                            <div class="mb-3">
                                <input name="fullname" value="<?php echo $fullname; ?>" type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <input name="email" type="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" placeholder="Message" name="message" id="" cols="" rows="5"><?php echo $message; ?></textarea>
                            </div>
                            <div>
                                <button name="submit" value="submit" type="submit" class="text-uppercase btn btn-dark">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <img src="assets/images/support-banner.jpg">
                </div>
            </div>

        </div>
    </section>
</main>

<?php
include('layout/footer.php')
?>