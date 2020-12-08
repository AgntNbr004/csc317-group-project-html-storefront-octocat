<?php
session_start();


if(isset($_SESSION["UserID"])){
	$userid = ($_SESSION["UserID"]);
	$id = ($_SESSION["UserID"]);
	//echo $id;
	$server='localhost';
	$user="brent";
	$password = "Student123!";
	$database = "Octocat";
	$connection = new mysqli($server, $user, $password, $database);
	//selects data from User's table
	$query = "SELECT * FROM `User` WHERE `USER_ID`= '$id'";
	
	$result = $connection->query($query);
	$count = mysqli_num_rows($result);
	//echo $count;

	while($row = mysqli_fetch_array($result)) {
	$theme_id = $row['theme_id'];
	//echo $row['theme_id'];
	}	
	//echo $theme_id;
	
	if($theme_id === 'bodywrap') {
		//echo "Hello world!<br>";	
		$queryPass = "UPDATE User set theme_id='bodywrapBrown' WHERE `USER_ID`= '$userid'";
		$resultPass = $connection->query($queryPass);
		header("Location: settings.php");
		die();

	
	} else {
		//echo "<h2>PHP is Fun!</h2>";	
		$queryTheme2 = "UPDATE User set theme_id='bodywrap' WHERE `USER_ID`= '$userid'";
		$resultTheme2 = $connection->query($queryTheme2);
		header("Location: settings.php");
		die();

	
	}
}
?>
