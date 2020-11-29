<?php
	$uname = $_GET["uname"];
	$upass = $_GET["pass"];
	$upassconf = $_GET["passconf"];
	$fname = $_GET["fname"];
	$lname = $_GET["lname"];
	$pptos = $_GET["pptos"];
	$suemail = $_GET["signup"];
	
	$email = $_GET["email"];
	
	$addr1 = $_GET["saddr1"];
	$addr2 = $_GET["saddr2"];
	$city = $_GET["city"];
	$state = $_GET["state"];
	$zip = $_GET["zipcode"];
	
	$server='localhost';
	$user="brent";
	$password = "Student123!";
	$database = "Octocat";
	$connection = new mysqli($server, $user, $password, $database);

	$query = "SELECT USER_ID FROM User WHERE username='$uname';";

	$result = $connection->query($query);
	$count = mysqli_num_rows($result);
	
	if ($count >= 1)
	{
		echo ("<script language='javascript'>
		    window.alert('That username is already taken. Please try again or reset password.');
		    window.location.href='register.php';
		    </script>");
	}
	else if ($upass != $upassconf)
	{
		echo ("<script language='javascript'>
		    window.alert('The password and password confirmation do not match. Please try again.');
		    window.location.href='register.php';
		    </script>");
	}
	else
	{
		$query = "INSERT INTO User VALUES (NULL, '$uname', '$upass', '$fname', '', '$lname', '$pptos', $suemail, true);";
		$result = $connection->query($query);
		
		$query = "SELECT USER_ID FROM User WHERE username='$uname';";
		$result = $connection->query($query);
		$count = mysqli_num_rows($result);
		
		$userid = ($result->fetch_assoc())['USER_ID'];
		
		$query = "INSERT INTO Email VALUES (NULL, $userid, '$email', false)";
		$result = $connection->query($query);
		
		$query = "INSERT INTO Address VALUES (NULL, $userid, true, '$addr1', '$addr2', '$city', (SELECT state_id FROM State WHERE abbreviation = '$state'), '$zip', false)";
		$result = $connection->query($query);
	}

	$connection->close();
	header("Location: registerconf.php"); 
?>
