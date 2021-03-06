<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</Title>
		<link rel="stylesheet" href="../css/storefront.css">
		<script language="javascript" src="../js/cart.js"></script>
	</head>
	<body>
		<?php include "../php/header.php" ?>
		<br>
		<div class="bodywrap">
			<form action="registersubmit.php" method="GET">
				<center>
					<thead>
						<h1 class="herotx sub1 sub2 sub4">Account Registration</h1>
					</thead>
				</center>
				<p>*=Required</p>
				<fieldset>
					<legend>Personal Information</legend>
					<table>
						<tr>
							<td><label for="fname">First Name*: </label></td>
							<td><input type="text" minlength="1" required placeholder="First Name" name="fname" /></td>
						</tr>
						<tr>
							<td><label for="mname">Middle Name: </label></td>
							<td><input type="text" required placeholder="Middle Name or Initial" name="mname" /></td>
						</tr>
						<tr>
							<td><label for="lname">Last Name*: </label></td>
							<td><input type="text" minlength="1" required placeholder="Last Name" name="lname" /><br></td>
						</tr>
						<tr>
							<td><label for="lname">Birth date: </label></td>
							<td><input type="date" name="dob" /><br></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<legend>Contact Information</legend>
					<table>
						<tr>
							<td><label for="email">Email Address*: </label></td>
							<td><input type="text" minlength="6" required placeholder="Email Address" name="email" /><br></td>
						</tr>
						<tr>
							<td><label for="phone">Phone Number*: </label></td>
							<td><input type="text" minlength="10" maxlength="14" required placeholder="Phone Number" name="phone" /><br></td>
						</tr>
						<tr>
							<td><label for="phonetype">Phone Type*: </label></td>
							<td><!--<input list="phonetypes" required placeholder="Select from list" id="phonetype" name="phonetype" />-->
								<select id="phonetypes" name="phonetype">
									<?php
										$server='localhost';
										$user="brent";
										$password = "Student123!";
										$database = "Octocat";
										$connection = new mysqli($server, $user, $password, $database);
										
										$query = "SELECT * FROM PhoneType;";
										$result = $connection->query($query);
										
										while ($record = $result->fetch_assoc())
										{
											$type = $record['phonetype'];
											echo "<option value=\"$type\">$type</option>";
										}
										
										$connection->close();
									?>
								</select>
							<!--</input>--></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<legend>Address</legend>
					<table>
						<tr>
							<td><label for="saddr1">Address Line #1*: </label></td>
							<td><input type="text" required placeholder="Address Line 1" name="saddr1" /><br></td>
						</tr>
						<tr>
							<td><label for="saddr2">Address Line #2: </label></td>
							<td><input type="text" placeholder="Address Line 2" name="saddr2" /><br></td>
						</tr>
						<tr>
							<td><label for="city">City #1*: </label></td>
							<td><input type="text" placeholder="City 1" name="city" /></td>
						</tr>
						<tr>
							<td><label for="state">State*: </label></td>
							<td>
								<select id="states" name="state">
									<?php
										$server='localhost';
										$user="brent";
										$password = "Student123!";
										$database = "Octocat";
										$connection = new mysqli($server, $user, $password, $database);
										
										$query = "SELECT * FROM State;";
										$result = $connection->query($query);
										
										while ($record = $result->fetch_assoc())
										{
											$type = $record['abbreviation'];
											echo "<option value=\"$type\">$type</option>";
										}
										
										$connection->close();
									?>
								</select>
					</td>
						</tr>
						<tr>
							<td><label for="zipcode">Zip code*: </label></td>
							<td><input type="text" required placeholder="Postal Code" minlength="5" maxlength="10" name="zipcode" /><br></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<legend>Login Information</legend>
					<table>
						<tr>
							<td><label for="uname">Username*: </label></td>
							<td><input type="text" required placeholder="Username" name="uname" /><br></td>
						</tr>
						<tr>
							<td><label for="pass">Password*: </label></td>
							<td><input type="password" required placeholder="Password" name="pass" /><br></td>
						</tr>
						<tr>
							<td><label for="passconf">Confirm Password*: </label></td>
							<td><input type="password" required placeholder="Re-enter Password" name="passconf" /><br></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<input type="checkbox" required name="pptos">By checking this box and clicking Register, I hereby agree to their <a href=#>Privacy Policy</a> and the <a href=#>Terms of Use</a>*</input>
					<br>
					<input type="checkbox" name="signup">I would also like to recieve promotional emails about product announcements, offers, news and more</input>
				</fieldset>
				<br>
				<input type="submit" value="Register" class="buttonOut">
			</form>
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>
