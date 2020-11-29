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
			<form action="../html/registerconf.html">
				<center>
					<thead>
						<h1>Account Registration</h1>
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
							<td><label for="lname">Last Name*: </label></td>
							<td><input type="text" minlength="1" required placeholder="Last Name" name="lname" /><br></td>
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
							<td><input list="states" required placeholder="Select from list" id="state" name="state" />
								<datalist id="states">
									<option value="AL">
									<option value="AK">
									<option value="AZ">
									<option value="AR">
									<option value="CA">
									<option value="CO">
									<option value="CT">
									<option value="DE">
									<option value="FL">
									<option value="GA">
									<option value="HI">
									<option value="ID">
									<option value="IL">
									<option value="IN">
									<option value="IA">
									<option value="KS">
									<option value="KY">
									<option value="LA">
									<option value="ME">
									<option value="MD">
									<option value="MA">
									<option value="MI">
									<option value="MN">
									<option value="MS">
									<option value="MO">
									<option value="MT">
									<option value="NE">
									<option value="NV">
									<option value="NH">
									<option value="NJ">
									<option value="NM">
									<option value="NY">
									<option value="NC">
									<option value="ND">
									<option value="OH">
									<option value="OK">
									<option value="OR">
									<option value="PA">
									<option value="RI">
									<option value="SC">
									<option value="SD">
									<option value="TN">
									<option value="TX">
									<option value="UT">
									<option value="VT">
									<option value="VA">
									<option value="WA">
									<option value="WV">
									<option value="WI">
									<option value="WY">
								</datalist>
					</td>
						</tr>
						<tr>
							<td><label for="zipcode">Zip code*: </label></td>
							<td><input type="text" required placeholder="Postal Code" minlength="5" maxlength="10" ame="zip code" /><br></td>
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
					<input type="checkbox" required >By checking this box and clicking Register, I hereby agree to their <a href=#>Privacy Policy</a> and the <a href=#>Terms of Use</a>*</input>
					<br>
					<input type="checkbox">I would also like to recieve promotional emails about product announcements, offers, news and more</input>
				</fieldset>
				<br>
				<input type="submit" value="Register">
			</form>
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>