<?php
	$uname = $_GET['uname'];
	$email = $_GET['email'];
	$bdate = $_GET['bdate'];
	$pass = $_GET['pass'];
	$conpass = $_GET['conpass'];
	//echo "lemons";



	$server='localhost';
	$user="brent";
	$password = "Student123!";
	$database = "Octocat";
	$connection = new mysqli($server, $user, $password, $database);

//Gets USER_ID that matches with the inputed username
	$queryUname = "SELECT * FROM `User` WHERE `username`= '$uname'";
	$resultUname = $connection->query($queryUname);
	while($row = mysqli_fetch_array($resultUname)) {
	//echo "lemons";
	$id_uname = $row['USER_ID'];
	//echo $id_uname;
	}	
//Gets USER_ID that matches with the inputed email
	$queryEmail = "SELECT * FROM `Email` WHERE `emailaddress`= '$email'";
	$resultEmail = $connection->query($queryEmail);
	while($row = mysqli_fetch_array($resultEmail)) {
	//echo "lemons";
	$id_email = $row['USER_ID'];
	//echo $id_email;
	}	
//Gets USER_ID that matches with the inputed birthday
	$queryBdate = "SELECT * FROM `User` WHERE `birthdate`= CAST('$bdate' AS DATE)";
	$resultBdate = $connection->query($queryBdate);
	while($row = mysqli_fetch_array($resultBdate)) {
	//echo "lemons";
	$id_bdate = $row['USER_ID'];
	//echo $id_bdate;
	}	

//Check to see that all filled in infromation has a match within the records
	if(empty($id_uname)) {

	echo '<script>alert("The Username You Have Entered Does Not Match Any Accounts, Please Try Again")</script>';
	echo "<script>setTimeout(\"location.href = 'passwordReset.php';\",200);</script>";
	die();

	} elseif(empty($id_email)) {

	echo '<script>alert("The Email You Have Entered Does Not Match Any Accounts, Please Try Again")</script>';
	echo "<script>setTimeout(\"location.href = 'passwordReset.php';\",200);</script>";
	die();

	} elseif(empty($id_bdate)) {

		echo '<script>alert("The Birthdate You Have Entered Does Not Match Any Accounts, Please Try Again")</script>';
		echo "<script>setTimeout(\"location.href = 'passwordReset.php';\",200);</script>";
		die();

	} else {
		
		if (($id_uname === $id_email) && ($id_uname === $id_bdate) && ($id_bdate === $id_email)){
		//echo "Matches are all there, and they are all one one record. Yay";
			if($pass === $conpass) {
				$queryPass = "UPDATE User set password='$conpass' WHERE `USER_ID`= '$id_uname'";
				$resultPass = $connection->query($queryPass);
				echo '<script>alert("Your Password Successfully Reset! You May Log In With Your New Password!")</script>';
				echo "<script>setTimeout(\"location.href = 'login.php';\",200);</script>";
				die();		
			} else {
				echo '<script>alert("The Password and Password Confirmation Does Not Match. Please Type Again, Carefully!")</script>';
				echo "<script>setTimeout(\"location.href = 'passwordReset.php';\",200);</script>";
				die();

			}
			
			
		} else {
		echo '<script>alert("The Information You Filled Out Does Not Correctly Match An Account, Please Try Again")</script>';
		echo "<script>setTimeout(\"location.href = 'passwordReset.php';\",200);</script>";
		die();

		}


	}



?>
