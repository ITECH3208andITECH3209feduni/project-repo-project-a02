<?php

// $con=mysqli_connect("localhost","root","","cv");
// if (mysqli_connect_errno()) {
//     var_dump("Failed to connect to MySQL: " . mysqli_connect_error());
//     exit();
//   }
// 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cv";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}