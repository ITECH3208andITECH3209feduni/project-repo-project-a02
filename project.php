<?php
$projects = $_POST['project'];
$sql = "DELETE FROM project WHERE cv_id = '" . $cv_id . "'";
$con->query($sql);
foreach ($projects as $project) {
    $title = $project['title'];
    $description = $project['description'];
    $link = $project['link'];

    $insert = "INSERT INTO project(project_title, description, link,  cv_id) 
    VALUES('" . $title . "','" . $description . "', '" . $link . "','" . $cv_id . "')";

    mysqli_query($con, $insert);
}
