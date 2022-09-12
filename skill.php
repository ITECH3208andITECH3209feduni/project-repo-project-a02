<?php
$skills = $_POST['skill'];
$sql = "DELETE FROM skill WHERE cv_id = '" . $cv_id . "'";
$con->query($sql);
if (is_array($skills)) {
    foreach ($skills as $skilltt) {
        $skill = $skilltt['skill'];
        $insert = "INSERT INTO skill(skill_name, cv_id) VALUES('" . $skill . "','" . $cv_id . "')";
        mysqli_query($con, $insert);
    }
} else {
    $skill = $skilltt['skill'] ?? "Skill";
    $insert = "INSERT INTO skill(skill_name, cv_id) VALUES('" . $skill . "','" . $cv_id . "')";
    mysqli_query($con, $insert);
}
