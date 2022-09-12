<?php

$acheves = $_POST['achive'];
$sql = "DELETE FROM achievement WHERE cv_id = '" . $cv_id . "'";
$con->query($sql);
if (is_array($acheves)) {
    foreach ($acheves as $ach) {
        $title = $ach['title'];
        $description = $ach['description'];

        $insert = "INSERT INTO achievement(title,description, cv_id) VALUES('" . $title . "','" . $description . "','" . $cv_id . "')";
        mysqli_query($con, $insert);
    }
} else {
    $title = $ach['title'] ?? 'Title';
    $description = $ach['description'] ?? 'Description';

    $insert = "INSERT INTO achievement(title,description, cv_id) VALUES('" . $title . "','" . $description . "','" . $cv_id . "')";
    mysqli_query($con, $insert);
}
