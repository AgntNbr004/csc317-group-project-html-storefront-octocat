<?php
	$uname = $_GET["uname"];
	$upass = $_GET["pass"];

	$server='localhost';
	$user="brent";
	$password = "Student123!";
	$database = "Octocat";
	$connection = new mysqli($server, $user, $password, $database);

	$query = "SELECT USER_ID FROM User WHERE username='$uname' and password='$upass';";

	$result = $connection->query($query);
	$count = mysqli_num_rows($result);

	if ($count == 1)
	{
		$userid = ($result->fetch_assoc())['USER_ID'];
		$currtime = date("Y-m-d H:i:s");
		
		session_start();
		$_SESSION["UserID"] = "$userid";
		$_SESSION["LastAction"] = "$currtime";
		
	}
	else
	{
		echo ("<script language='javascript'>
		    window.alert('sername / Password incorrect, or account not found!');
		    window.location.href='login.php';
		    </script>");
	}

	$connection->close();
?>
