<?php
session_start();

if(isset($_SESSION["UserID"])) {
	$id = ($_SESSION["UserID"]);
	$server='localhost';
	$user="brent";
	$password = "Student123!";
	$database = "Octocat";
	$connection = new mysqli($server, $user, $password, $database);

//selects data from User's table
	$query = "SELECT * FROM User WHERE USER_ID = $id;";
	$result = $connection->query($query);

	while($row = mysqli_fetch_array($result)) {
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$password = $row['password'];
		$unity = $row['unity'] ? 'checked' : '';
		$unreal = $row['unreal'] ? 'checked' : '';
		$cry = $row['cryengine'] ? 'checked' : '';
	}	
//selects data from Address table	
	$queryAddress = "SELECT * FROM Address WHERE USER_ID = $id ORDER BY principal DESC LIMIT 1;";
	$resultAddress = $connection->query($queryAddress);
	$countAddress = mysqli_num_rows($resultAddress);

	while($row = mysqli_fetch_array($resultAddress)) {
		$city = $row['city'];
		$address1 = $row['addressline1'];
		$address2 = $row['addressline2'];
		$state_id = $row['STATE_ID'];  //Use id to select from State Table.
		$zipcode = $row['zipcode'];
	}
//selects data from state table
	$queryState = "SELECT * FROM State WHERE STATE_ID = $state_id;";
	$resultState = $connection->query($queryState);
	$countState = mysqli_num_rows($resultState);

	while($row = mysqli_fetch_array($resultState)) {
		$abbreviation = $row['abbreviation'];
		$stateName = $row['name'];
	}
//select data from email table
	$queryEmail = "SELECT * FROM Email WHERE USER_ID = $id;";
	$resultEmail = $connection->query($queryEmail);
	$countEmail = mysqli_num_rows($resultEmail);

	while($row = mysqli_fetch_array($resultEmail)) {
		$email = $row['emailaddress'];	
	}
//select data from phone table
	$queryPhone = "SELECT * FROM Phone WHERE USER_ID = $id;";
	$resultPhone = $connection->query($queryPhone);
	$countPhone = mysqli_num_rows($resultPhone);

	while($row = mysqli_fetch_array($resultPhone)) {
		$phoneNumber = $row['phonenumber'];
	}
} else {
	header("Location: login.php");
	die();
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../css/storefront.css" />
		<script language="javascript" src="../js/cart.js"></script>
		<?php include "../php/theme.php" ?>
		<?php include "../php/settingsUpdate.php" ?>
		</head>
	<body>
		<?php include "../php/header.php" ?>
		<br>
		<div class="<?php echo ($theme_id); ?>">
			<h1 class="herotx sub1">Settings</h1>
			<h3>General Settings</h3>
			<table>
				<tr>
					<td><label for="theme">Website Theme: </label></td>
					<td>
						<form action="themeUpdate.php" method="GET">
							<input type="submit" value="Toggle Theme">
						</form>

						<!--<select name="themes" id="themes">
							<option value="light">Light</option>
							<option value="dark">Dark</option>
						</select>-->
					</td>
				</tr>
			</table>
			<!--<br>
			<form action="themeUpdate.php" method="GET">
			<input type="submit" value="Update Site Theme">
			</form>
			<br>-->

			<h3>Account Settings</h3>
			<?php
				if(array_key_exists('updateaccount', $_POST)) { 
					updateAccount();
				} 
				else if(array_key_exists('cancelaccount', $_POST)) {
					cancelAccount();
				}
			?>
			<form method="post">
				<fieldset>
					<legend onclick="personaltab()">Personal Information &#9660;</legend>
									
						<table id="personaltab">
						<tr>
							<td><label for="fname">First Name: </label></td>
							<td><input type="text" minlength="1" required placeholder="First Name" value="<?php echo htmlspecialchars($firstname); ?>" name="fname" /></td>
						</tr>
						<tr>
							<td><label for="lname">Last Name: </label></td>
							<td><input type="text" minlength="1" required placeholder="Last Name" value="<?php echo htmlspecialchars($lastname); ?>" name="lname" /><br></td>
						</tr>
					</table>
					
								</fieldset>
				<br>
				<fieldset>
					<legend  onclick="contacttab()">Contact Information &#9660;</legend>
					<table  id="contacttab">
						<tr>
							<td><label for="email">Email Address: </label></td>
							<td><input type="text" minlength="6" required placeholder="Email Address" value="<?php echo htmlspecialchars($email); ?>" name="email" /><br></td>
						</tr>
						<tr>
							<td><label for="phone">Phone Number: </label></td>
							<td><input type="text" minlength="10" maxlength="14" required placeholder="Phone Number" value="<?php echo htmlspecialchars($phoneNumber); ?>" name="phone" /><br></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<legend  onclick="addresstab()">Address &#9660;</legend>
					<table  id="addresstab">
						<tr>
							<td><label for="saddr1">Street Address #1: </label></td>
							<td><input type="text" required placeholder="Address Line 1" value="<?php echo htmlspecialchars($address1); ?>" name="saddr1" /><br></td>
						</tr>
						<tr>
							<td><label for="saddr2">Street Address #2: </label></td>
							<td><input type="text" placeholder="Address Line 2" value="<?php echo htmlspecialchars($address2); ?>" name="saddr2" /><br></td>
						</tr>
						<tr>
							<td><label for="city">City: </label></td>
							<td><input type="text" required placeholder="City" value="<?php echo htmlspecialchars($city); ?>" name="city" /></td>
						</tr>
						<tr>
							<td><label for="state">State: </label></td>
							<td>
								<input list="states" required placeholder="Select from list" value="<?php echo htmlspecialchars($abbreviation); ?>" id="state" name="state" />
								<datalist id="states">
									<?php
										$server='localhost';
										$user="brent";
										$password = "Student123!";
										$database = "Octocat";
										$connection = new mysqli($server, $user, $password, $database);
										
										$query = "SELECT * FROM State;";
										$result = $connection->query($query);
										
										while($record = $result->fetch_assoc())
										{
											$state = $record['abbreviation'];
										
											echo "<option value=\"$state\">";
										}
										
										$connection->close();
									?>
								</datalist>
							</td>
						</tr>
						<tr>
							<td><label for="zipcode">Zipcode: </label></td>
							<td><input type="text" required placeholder="Postal Code" value="<?php echo htmlspecialchars($zipcode); ?>" minlength="5" maxlength="10" name="zipcode" /><br></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<legend  onclick="logintab()">Login Information &#9660;</legend>
					<table  id="logintab">
						<tr>
						<td><label for="oldPass">Old Password: </label></td>
						<td><input type="password" placeholder="Password" name="oldPass" /><br></td>
						</tr>
						<tr>
							<td><label for="newPass">New Password: </label></td>
							<td><input type="password" placeholder="Password" name="newPass" /><br></td>
						</tr>
						<tr>
							<td><label for="conPass">Confirm New Password: </label></td>
							<td><input type="password" placeholder="Password" name="conPass" /><br></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<table class="fixed">
					<col width="100px" />
					<col width="80%" />
					<col width="100px" />
					<tr>
						<td><input name="updateaccount" type="submit" class="buttonOut" value="Update Account Information"></td>
						<td />
						<td><input name="cancelaccount" type="submit" class="buttonOut" style="background-color:darkred; color:white" value="Cancel Account"></td>
					</tr>
				</table>
			
	</form>

			<h3>Site Settings</h3>
			<input type="checkbox" id="unitycompatible" name="unitycompatible" value="Unity" <?php echo htmlspecialchars($unity); ?>/>
			<label for="unitycompatible">Display assets that are compatible with <b>Unity</b></label><br>
			<input type="checkbox" id="unrealcompatible" name="unrealcompatible" value="Unreal" <?php echo htmlspecialchars($unreal); ?>/>
			<label for="unrealcompatible">Display assets that are compatible with <b>Unreal</b></label><br>
			<input type="checkbox" id="cryenginecompatible" name="cryenginecompatible" value="CryEngine" <?php echo htmlspecialchars($cry); ?>/>
			<label for="cryenginecompatible">Display assets that are compatible with <b>CryEngine</b></label><br>
			<br>
			<input type="submit" class="buttonOut" value="Update Site Preferences">
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>
