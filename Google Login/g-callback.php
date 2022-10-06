<?php
require_once '..\config.php';
require_once '..\vendor/autoload.php';


require('..\connection.php');

session_start();

var_dump($_GET["code"]);
if (isset($_GET["code"])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
    var_dump($token);
    $_SESSION['access_token'] = $token;
}

$oauth = new Google_Service_Oauth2($client);
$userData = $oauth->userinfo_v2_me->get();



$email = $userData["email"];
$_SESSION['gender'] = $userData["gender"];
$_SESSION['picture'] = $userData["picture"];
$_SESSION['familyName'] = $userData["familyName"];
$name = $userData["givenName"];

if ($userData['email']) {
    $select = " SELECT * FROM user where email = '$email'";

    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['name'] = $name;
        $_SESSION['id'] = $row['id'];
        header('location:profile.php');
    } else {
        $sql = "INSERT INTO user(name, email) 
        VALUES('" . $name . "', '" . $email . "')";
    
    
        mysqli_query($con, $sql);
        $user_id= mysqli_insert_id($con);

        if ($user_id) {
            $_SESSION['name'] = $name;
            $_SESSION['id'] = $user_id;
            header('location:profile.php');
        }
    }
}
header('location:..\profile.php');

echo "<pre>";
var_dump($userProfile);
