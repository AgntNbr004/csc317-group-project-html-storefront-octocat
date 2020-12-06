<?php
//echo "nice try";
//header('Location: ../index.php');
	session_start();
	$userid = ($_SESSION["UserID"]);
	//echo $userid;
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$oldPass = $_GET['oldPass'];
	$newPass = $_GET['newPass'];
	$conPass = $_GET['conPass'];
	//echo $oldPass;
	//echo $newPass;
	//echo $conPass;

	//echo $lname;
	
//connection
	$server = 'localhost';
	$user = 'brent';
	$password = 'Student123!';
	$database = 'Octocat';
	$connection = new mysqli($server, $user, $password, $database);
	//$query = "UPDATE User SET firstname='$fname' WHERE `USER_ID`= '$userid'";
	$query = "UPDATE User set lastname='$lname', firstname='$fname' WHERE `USER_ID`= '$userid'";
	$result = $connection->query($query);

//password
	//echo $userid;
	//echo $sql;
	$sql = "SELECT password FROM User WHERE USER_ID= '$userid'";
	$resultPass = $connection->query($sql);
	$count = mysqli_num_rows($resultPass);
	//echo $count;
	//echo $resultPass;
	while($row = mysqli_fetch_array($resultPass))
	{
	$storedPass = $row['password'];
	}
	if ($oldPass === $storedPass) {
	//echo "Have a good day!";
		if ($newPass === $conPass) {
		//echo "Nice!";
			$queryPass = "UPDATE User set password='$conPass' WHERE `USER_ID`= '$userid'";
			$resultPass = $connection->query($queryPass);

		} else {
			echo '<script>alert("You Must Retype Your New Password Correctly!")</script>';
			echo "<script>setTimeout(\"location.href = 'settings.php';\",500);</script>";
			die();
		}

	} else {
		echo '<script>alert("You must type your previous password correctly!")</script>';
		echo "<script>setTimeout(\"location.href = 'settings.php';\",500);</script>";
			die();

	}

	
?>
