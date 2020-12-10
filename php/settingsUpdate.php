<?php
function updateAccount() {
		session_start();
		$userid = ($_SESSION["UserID"]);
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$oldPass = $_POST['oldPass'];
		$newPass = $_POST['newPass'];
		$conPass = $_POST['conPass'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address1 = $_POST['saddr1'];
		$address2 = $_POST['saddr2'];
		$city = $_POST['city'];
		$zipcode = $_POST['zipcode'];
		$state = $_POST['state'];

	// Connection
		$server = 'localhost';
		$user = 'brent';
		$password = 'Student123!';
		$database = 'Octocat';
		$connection = new mysqli($server, $user, $password, $database);
		
	// Password
		$sql = "SELECT password FROM User WHERE USER_ID= '$userid'";
		$resultPass = $connection->query($sql);
		while($row = mysqli_fetch_array($resultPass)) {
			$storedPass = $row['password'];
		}
		if ($oldPass === $storedPass) {
			if(!empty($newPass) && !empty($conPass)) {
				if ($newPass === $conPass) {
					$queryPass = "UPDATE User set password='$conPass' WHERE `USER_ID`= '$userid'";
					$resultPass = $connection->query($queryPass);

				} else {
					echo '<script>alert("You Must Retype Your New Password Correctly!")</script>';
					echo "<script>setTimeout(\"location.href = 'settings.php';\",500);</script>";
					die();
				}
			} elseif (empty($newPass) && !empty($conPass)) {
				echo '<script>alert("You Must Retype Your New Password Correctly!")</script>';
				echo "<script>setTimeout(\"location.href = 'settings.php';\",500);</script>";
				die();
			} elseif (!empty($newPass) && empty($conPass)) {
				echo '<script>alert("You Must Retype Your New Password Correctly!")</script>';
				echo "<script>setTimeout(\"location.href = 'settings.php';\",500);</script>";
				die();
			}
		} else {
			echo '<script>alert("You must type your previous password correctly!")</script>';
			echo "<script>setTimeout(\"location.href = 'settings.php';\",500);</script>";
			die();
		}

	// Name
		$query = "UPDATE User set lastname='$lname', firstname='$fname' WHERE `USER_ID`= '$userid'";
		$result = $connection->query($query);

	// Email And Phone
		$queryEmail = "UPDATE Email set emailaddress='$email' WHERE `USER_ID`= '$userid'";
		$resultEmail = $connection->query($queryEmail);

		$queryPhone = "UPDATE Phone set phonenumber='$phone' WHERE `USER_ID`= '$userid'";
		$resultPhone = $connection->query($queryPhone);

	// Address
		$queryAddress = "UPDATE Address set addressline1='$address1', addressline2='$address2', city='$city', zipcode='$zipcode' WHERE `USER_ID`= '$userid'";
		$resultAddress = $connection->query($queryAddress);
	// State
		$queryState = "SELECT STATE_ID FROM State WHERE abbreviation= '$state'";
		$resultState = $connection->query($queryState);
		while($row = mysqli_fetch_array($resultState)) {
			$storedState = $row['STATE_ID'];
		}
		$queryStateUpdate = "UPDATE Address set STATE_ID='$storedState' WHERE `USER_ID`= '$userid'";
		$resultStateUpdate = $connection->query($queryStateUpdate);

	// Redirect
		echo '<script>alert("Account Info Updated")</script>';
            	echo "<script>setTimeout(\"location.href = 'settings.php';\",500);</script>";
	}

	function cancelAccount() {
		$userid = ($_SESSION["UserID"]);
					
		$server='localhost';
		$user="brent";
		$password = "Student123!";
		$database = "Octocat";
		$connection = new mysqli($server, $user, $password, $database);
		

		$query = "DELETE FROM User WHERE USER_ID = $userid LIMIT 1;";
		$result = $connection->query($query);

		
		unset($_SESSION["UserID"]);
		echo "<script> alert('Account Deleted!'); window.location.href='/index.php'; </script>";
		
		$connection->close();
	}

?>
