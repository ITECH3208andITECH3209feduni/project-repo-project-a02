<?php
$cv_id = null;

if (isset($_GET['cv_id']) && $_GET['cv_id'] != null) {
    $cv_id = $_GET['cv_id'];
} else {
    header('location:profile.php');
}

require('connection.php');
$result = mysqli_query($con, " SELECT * FROM  cv where  id = '$cv_id';");


$row = mysqli_fetch_array($result);


$about = mysqli_query($con, " SELECT * FROM  about where  cv_id = '$cv_id';");
$about = mysqli_fetch_array($about);

$social = mysqli_query($con, " SELECT * FROM  social where  cv_id = '$cv_id' LIMIT 1;");
$social = mysqli_fetch_array($social);

$achievement = mysqli_query($con, " SELECT * FROM  achievement where  cv_id = '$cv_id' LIMIT 2;");

$skill = mysqli_query($con, " SELECT * FROM  skill where  cv_id = '$cv_id' LIMIT 6;");


$education = mysqli_query($con, " SELECT * FROM  education where  cv_id = '$cv_id' LIMIT 2;");

$experience = mysqli_query($con, " SELECT * FROM  experience where  cv_id = '$cv_id' LIMIT 2;");

$project = mysqli_query($con, " SELECT * FROM  project where  cv_id = '$cv_id' LIMIT 2;");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/cv.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.3.3/jQuery.print.min.js"></script>
  </head>

<body>
    <?php
    include('cvinclude.php');
    ?>




</body>


</html>
    
