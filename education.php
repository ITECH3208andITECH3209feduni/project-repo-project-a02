<?php
$edus = $_POST['edu'];
$sql = "DELETE FROM education WHERE cv_id = '" . $cv_id . "'";
$con->query($sql);
foreach ($edus as $edu) {
    $school = $edu['school'];
    $degree = $edu['degree'];
    $city = $edu['city'];
    $startdate = $edu['startdate'];
    $graduate_date = $edu['graduate_date'];
    $description = $edu['description'];

    $insert = "INSERT INTO education(school,degree,city,startdate,graduate_date,description, cv_id) 
    VALUES('" . $school . "','" . $degree . "','" . $city . "','" . $startdate . "','" . $graduate_date . "','" . $description . "','" . $cv_id . "')";
    mysqli_query($con, $insert);
}
