<?php

require('connection.php');


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);

    var_dump($name);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $cpass = mysqli_real_escape_string($con, $_POST['cpassword']);
    $date = date('Y-m-d');
    $status = '1';
    $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user already exists';
    } else {
        if ($pass != $cpass) {
            $error[] = 'password not matched';
        } else {
            $sql = "INSERT INTO user(name, email, phone, password, status, date) 
        VALUES('".$name."', '".$email."', '".$phone."', '".$pass."', '".$status."', '".$date."')";
            if ($con->query($sql) === TRUE) {
                header("Location:login.php?status=User successfully registered");
            } else {
                $error[] =  "Error: " . $sql . "<br>" . $con->error;
            }

            $con->close();
            // var_dump("aalok");
        }
    }
}
include('layout/header.php')
?>

        <main class="register-pg">
            <section class="register-section">
                <div class="container text-center">
                    <div class="register-section-title font-italian text-center">Create your profile</div>

                    <div class="register-section-content grid">
                        <div class="register-content-l flex flex-c">
                            <img src="assets/images/user-img-lg.png" />
                        </div>

                        <div class="register-content-m bg-old-lace">
                            <form class="register-form flex flex-col" method="post">
                                <?php
                                if (isset($error)) {
                                    foreach ($error as $error) {
                                        echo '<span class="error-msg">' . $error . '</span>';
                                    };
                                };
                                ?>
                                <div class="form-elem flex">
                                    <label for="">Name:</label>
                                    <input type="text" name="name" class="form-control bg-grey" placeholder="">
                                </div>

                                <div class="form-elem flex">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control bg-grey">
                                </div>
                                <div class="form-elem flex">
                                    <label for="">Phone:</label>
                                    <div class="country-code flex">
                                        <img src="assets/images/flag-icon.png">
                                        <select>
                                            <option></option>
                                        </select>
                                        <span class="country-code-value">+61</span>
                                    </div>
                                    <input type="text" name="phone" class="form-control bg-grey">
                                </div>
                                <div class="form-elem flex">
                                    <label for="">Create Password:</label>
                                    <input type="text" name="password" class="form-control bg-grey">
                                </div>
                                <div class="form-elem flex">
                                    <label for="">Confirm Password:</label>
                                    <input type="text" name="cpassword" class="form-control bg-grey">
                                </div>


                                <div class="font-italian register-opt-separator">OR</div>

                                <h3 class="font-italian text-left social-links-title">Connect Via</h3>
                                <ul class="social-links flex">
                                    <li class="social-links-item">
                                        <a href="#"><img src="assets//images/google-logo.png" alt="google loog"></a>
                                    </li>
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

                                <input type="submit" name="submit" class="sign-up-btn bg-light-blue" value="Sign up" />
                            </form>
                        </div>

                        <div class="register-content-r">
                            <img src="assets/images/persons-img.png" alt="">
                        </div>
                    </div>
                </div>
            </section>
        </main>

      <?php
      
include('layout/footer.php')
      ?>