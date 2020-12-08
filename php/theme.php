<?php
$theme_id = "bodywrap";
session_start();
if(isset($_SESSION["UserID"])){
	$id = ($_SESSION["UserID"]);

		$server='localhost';
	$user="brent";
	$password = "Student123!";
	$database = "Octocat";
	$connection = new mysqli($server, $user, $password, $database);
	//$lemons = "orange";
//selects data from User's table
	$query = "SELECT * FROM `User` WHERE `USER_ID`= '$id'";
	$result = $connection->query($query);
	while($row = mysqli_fetch_array($result)) {
	$theme_id = $row['theme_id'];
	//echo $row['theme_id'];
	}	

}




?>
