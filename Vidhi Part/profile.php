<?php
session_start();
if (isset($_SESSION['name']) && $_SESSION['name'] != null && $_SESSION['id'] != null) {
} else {
    header('location:login.php');
}


$errors = array();

require('connection.php');
if (isset($_GET['delete_cv']) && $_GET['delete_cv'] != null) {

    $delete_id = $_GET['delete_cv'];

    $sql = "DELETE FROM cv WHERE id = '" . $delete_id . "'";
    $con->query($sql);

    $sql = "DELETE FROM about WHERE cv_id = '" . $delete_id . "'";
    $con->query($sql);

    $sql = "DELETE FROM achievement WHERE cv_id = '" . $delete_id . "'";
    $con->query($sql);

    $sql = "DELETE FROM award WHERE cv_id = '" . $delete_id . "'";
    $con->query($sql);

    $sql = "DELETE FROM education WHERE cv_id = '" . $delete_id . "'";
    $con->query($sql);

    $sql = "DELETE FROM experience WHERE cv_id = '" . $delete_id . "'";
    $con->query($sql);

    $sql = "DELETE FROM project WHERE cv_id = '" . $delete_id . "'";
    $con->query($sql);

    $sql = "DELETE FROM skill WHERE cv_id = '" . $delete_id . "'";
    $con->query($sql);

    $sql = "DELETE FROM social WHERE cv_id = '" . $delete_id . "'";
    $con->query($sql);

    header("Location:profile.php");
}


$user_id = $_SESSION['id'];
$user_check_query = "SELECT * FROM user WHERE id='$user_id' LIMIT 1";
$result = mysqli_query($con, $user_check_query);
$user = mysqli_fetch_assoc($result);


if (isset($_POST['booksubmit'])) {
    $booking_date = mysqli_real_escape_string($con, $_POST['booking_date']);
    $remarks = mysqli_real_escape_string($con, $_POST['remarks']);
    $user_id = $_SESSION['id'];
    $status = "Pending";
    $date = date('Y-m-d');
    $insert11 = "INSERT INTO booking(user_id, status, date, booking_date, remarks) VALUES('" . $user_id . "','" . $status . "','" . $date . "','" . $booking_date . "','" . $remarks . "')";
    $con->query($insert11);

    $from = $user['profile_pic'];
    $to = "sajal.bhandari90@gmail.com";
    $subject = "New Consult Request From ". $user['name'] .' at '.$booking_date;
    $message = "Some member form your site cv builder need some help";
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);

    header("Location:profile.php?status=your booking request has been successfully sent.");
}


$bookingq = mysqli_query($con, " SELECT * FROM  booking where  user_id = '$user_id';");
$bookingadata = mysqli_fetch_array($bookingq);


$profile_url = "https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg";
if ($user['profile_pic'] && $user['profile_pic'] != null) {
    if (file_exists($user['profile_pic'])) {
        $_SESSION['profile_pic'] = $user['profile_pic'];
        $profile_url  = $user['profile_pic'];
    } else {
        $_SESSION['profile_pic'] = null;
    }
}

// initializing variables
$username = $user['username'];
$name    = $user['name'];
$phone    = $user['phone'];
$email    = $user['email'];

// connect to the database

// REGISTER USER
if (isset($_POST['submit'])) {




    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $cpass = mysqli_real_escape_string($con, $_POST['cpassword']);
    $date = date('Y-m-d');
    $status = '1';
    $target_file = "";



    //    upload profile pic


    if (isset($_FILES["profile_image"]["name"]) && $_FILES["profile_image"]["name"] != null) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            array_push($errors, "Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            } else {
                array_push($errors, "Sorry, there was an error uploading your file.");
            }
        }
    }

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) {
        array_push($errors, "Name is required");
    }

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone Number is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if ($pass != $cpass) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' OR phone='$phone' AND WHERE id != '$user_id' LIMIT 1";
    $check_result = mysqli_query($con, $user_check_query);
    $check_user = mysqli_fetch_assoc($result);

    if ($check_user) { // if user exists
        if ($check_user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($check_user['email'] === $email) {
            array_push($errors, "email already exists");
        }

        if ($check_user['phone'] === $phone) {
            array_push($errors, "Phone Number already exists");
        }
    }


    if (count($errors) == 0) {

        if ($pass && $pass != null) {
            $password = md5($pass);
        } else {
            $password = $user['password'];
        }

        $sql = "UPDATE user  SET name = '" . $name . "', email = '" . $email . "',
         username = '" . $username . "', phone = '" . $phone . "',
          password = '" . $password . "' , profile_pic = '" . $target_file . "' WHERE id = '" . $user_id . "'";
        $retval = mysqli_query($con, $sql);
        if (!$retval) {
            array_push($errors, "Could not update data");
        }
        header("Location:profile.php?status=Updated data successfully");

        $con->close();
    }
}



$cehckuserCv = "SELECT * FROM about
INNER JOIN cv ON about.cv_id = cv.id  WHERE cv.user_id='$user_id'";
$resultcv = mysqli_query($con, $cehckuserCv);


include('layout/header.php');
