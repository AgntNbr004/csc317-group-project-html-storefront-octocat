<?php
$uname = $_GET["uname"];
$upass = $_GET["pass"];

$server='localhost';
$user="brent";
$password = "Student123!";
$database = "Octocat";
$connection = new mysqli($server, $user, $password, $database);

$query = "SELECT * FROM Users WHERE username='$uname' and password='$upass';";

$result = $connection->query($query);
$count = mysqli_num_rows($result);



$connection->close();
?>
