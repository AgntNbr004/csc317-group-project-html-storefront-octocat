<?php
	function login($uname, $upass) {
		//$uname = $_GET["uname"];
		//$upass = $_GET["pass"];
		
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
			
			if(isset($_SESSION["UserID"])){ //redirect to homepage after login
			header('Location: ../index.php');
			die();

			} else {
			echo "Please try again";
			}		
		}
		else
		{
			echo ("<script language='javascript'>
			    window.alert('Username / Password incorrect, or account not found!');
			    window.location.href='login.php';
			    </script>");
		}

		$connection->close();
	}
	
	function logout() {
		$userid = ($_SESSION["UserID"]);
		unset($_SESSION["UserID"]);
		echo "<script> alert('You have been logged out.'); window.location.href='/index.php'; </script>";
	}	
?>
