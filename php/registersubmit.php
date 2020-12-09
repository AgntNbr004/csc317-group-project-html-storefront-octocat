<?php
	$uname = $_GET['uname'];
	$upass = $_GET['pass'];
	$upassconf = $_GET['passconf'];
	$fname = $_GET['fname'];
	$mname = $_GET['mname'];
	$lname = $_GET['lname'];
	$bday = $_GET['dob'];
	$pptos = isset($_GET['pptos']);
	$theme_id = "bodywrap";

	$email = $_GET['email'];
	$suemail = isset($_GET['signup']);
	
	$phone = $_GET['phone'];
	$ptype = $_GET['phonetype'];
	$addr1 = $_GET['saddr1'];
	$addr2 = $_GET['saddr2'];
	$city = $_GET['city'];
	$state = $_GET['state'];
	$zip = $_GET['zipcode'];
	
	$server = 'localhost';
	$user = 'brent';
	$password = 'Student123!';
	$database = 'Octocat';
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
		$query = "INSERT INTO User VALUES (NULL, '$uname', '$upass', '$fname', '$mname', '$lname', CAST('$bday' AS DATE), '$theme_id', $pptos, true);";
		$result = $connection->query($query);
		
		echo $connection->error;
				
		$query = "SELECT USER_ID FROM User WHERE username = '$uname';";
		$result = $connection->query($query);
		$count = mysqli_num_rows($result);
		
		$userid = ($result->fetch_assoc())['USER_ID'];
		echo ("<script>alert('You Have Successfully Regisered Your Account!')</script>");
		
		$query = "INSERT INTO Email VALUES (NULL, $userid, '$email', $suemail)";
		$result = $connection->query($query);
		
		$query = "SELECT PHONETYPE_ID FROM PhoneType where phonetype='$ptype'";
		$result = $connection->query($query);
		$phoneid = ($result->fetch_assoc())['PHONETYPE_ID'];
		
		$query = "INSERT INTO Phone VALUES (NULL, $userid, '$phone', $phoneid)";
		$result = $connection->query($query);
		
		$query = "INSERT INTO Address VALUES (NULL, $userid, true, '$addr1', '$addr2', '$city', (SELECT state_id FROM State WHERE abbreviation = '$state'), '$zip', false)";
		$result = $connection->query($query);
	}

	$connection->close();
	echo "<script>window.location = 'registerconf.php'</script>";
?>
