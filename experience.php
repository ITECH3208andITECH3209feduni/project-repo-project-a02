<?php

$exps = $_POST['exp'];
$sql = "DELETE FROM achievement WHERE cv_id = '" . $cv_id . "'";
$con->query($sql);
foreach ($exps as $exp) {
    $title = $ach['title'];
    $description = $ach['description'];
    $insert = "INSERT INTO achievement(title,description, cv_id) VALUES('" . $title . "','" . $description . "','" . $cv_id . "')";
    mysqli_query($con, $insert);
}
