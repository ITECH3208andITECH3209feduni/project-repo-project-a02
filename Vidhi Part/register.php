<?php

require('connection.php');

require_once "config.php";
$loginURL = $client->createAuthUrl();

// initializing variables
$username = "";
$name    = "";
$phone    = "";
$email    = "";
$errors = array();

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
    if (empty($pass)) {
        array_push($errors, "Password is required");
    }
    if ($pass != $cpass) {
        array_push($errors, "The two passwords do not match");
    }
    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' OR phone='$phone' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);


    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }

        if ($user['phone'] === $phone) {
            array_push($errors, "Phone Number already exists");
        }
    }


    if (count($errors) == 0) {
        $password = md5($pass);
        $sql = "INSERT INTO user(name, email, username, phone, password, status, date) 
                 VALUES('" . $name . "', '" . $email . "', '" . $username . "','" . $phone . "', '" . $password . "', '" . $status . "', '" . $date . "')";

        if ($con->query($sql) === TRUE) {

            $cv_id = $con->insert_id;
            $title = "title";
            $description = "Description";
            $achive = "INSERT INTO achievement(title,description, cv_id) VALUES('" . $title . "','" . $description . "','" . $cv_id . "')";
            mysqli_query($con, $achive);

            $job_title = "Title";
            $organization = "Orgination";
            $location = "Location";
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
            $description = "Description";
            $exps = "INSERT INTO experience(job_title,organization,location,start_date,end_date,description, cv_id) 
    VALUES('" . $job_title . "','" . $organization . "','" . $location . "','" . $start_date . "','" . $end_date . "','" . $description . "', '" . $cv_id . "')";
            mysqli_query($con, $exps);


            $school = "School Name";
            $degree = "Degree Name";
            $city = "City";
            $startdate = date('Y-m-d');
            $graduate_date = date('Y-m-d');
            $description = "Description";

            $edus = "INSERT INTO education(school,degree,city,startdate,graduate_date,description, cv_id) 
            VALUES('" . $school . "','" . $degree . "','" . $city . "','" . $startdate . "','" . $graduate_date . "','" . $description . "','" . $cv_id . "')";
            mysqli_query($con, $edus);

            $link = "add link here";

            $projs = "INSERT INTO project(project_title, description, link,  cv_id) 
    VALUES('" . $title . "','" . $description . "', '" . $link . "','" . $cv_id . "')";

            mysqli_query($con, $projs);

            $skill = "Skill";
            $skils = "INSERT INTO skill(skill_name, cv_id) VALUES('" . $skill . "','" . $cv_id . "')";
            mysqli_query($con, $skils);




            header("Location:login.php?status=User successfully registered");
        } else {
            array_push($errors, "Something went error!!!");
        }

        $con->close();
    }
}
