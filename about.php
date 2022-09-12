<?php

$sql = "DELETE FROM about WHERE cv_id = '" . $cv_id . "'";
$con->query($sql);

$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$designation = mysqli_real_escape_string($con, $_POST['designation']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$summary = mysqli_real_escape_string($con, $_POST['summary']);
$facebook = mysqli_real_escape_string($con, $_POST['facebook']);

$imagePath = null;
if (isset($_FILES["image"]) && isset($_FILES['image']['name'])) {
    $filename = $_FILES['image']['name'];
    $imagePath =  file_get_contents($_FILES["image"]["tmp_name"]);
    $data = base64_encode($imagePath);
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $base64_str = 'data:image/' . $ext . ';base64,' . $data;
    // Display the output 
    $imagePath =  $base64_str;
}


$insert = "INSERT INTO about(firstname,lastname,designation,address,city, cv_id, email, phone, summary, image ) 
        VALUES('" . $firstname . "','" . $lastname . "','" . $designation . "',
        '" . $address . "','" . $city . "','" . $cv_id . "','" . $email . "','" . $phone . "',
        '" . $summary . "','" . $imagePath . "')";
if (mysqli_query($con, $insert)) {
    $insertSocial = "INSERT INTO social(website, link, cv_id) VALUES('Facebook', '" . $facebook . "', '" . $cv_id . "' )";
    mysqli_query($con, $insertSocial);
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($con);
}
