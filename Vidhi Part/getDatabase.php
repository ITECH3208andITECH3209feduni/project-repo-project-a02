<?php

$user_id = $_SESSION['id'];

$cv_id = $user_id;


$about = mysqli_query($con, " SELECT * FROM  about where  cv_id = '$cv_id';");
$about = mysqli_fetch_array($about);

$social = mysqli_query($con, " SELECT * FROM  social where  cv_id = '$cv_id' LIMIT 1;");
$social = mysqli_fetch_array($social);

$achievement = mysqli_query($con, " SELECT * FROM  achievement where  cv_id = '$cv_id' LIMIT 2;");

$skill = mysqli_query($con, " SELECT * FROM  skill where  cv_id = '$cv_id' LIMIT 6;");


$education = mysqli_query($con, " SELECT * FROM  education where  cv_id = '$cv_id' LIMIT 2;");

$experience = mysqli_query($con, " SELECT * FROM  experience where  cv_id = '$cv_id' LIMIT 2;");

$project = mysqli_query($con, " SELECT * FROM  project where  cv_id = '$cv_id' LIMIT 2;");
