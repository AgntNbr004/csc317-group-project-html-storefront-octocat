<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../css/storefront.css" />
		<script language="javascript" src="../js/cart.js"></script>
	</head>
	<body>
		<?php include "../php/header.php" ?>
		<br>
		<div class="bodywrap">
			<h1 class="herotx sub1">Settings</h1>
			<h3>General Settings</h3>
			<table>
				<tr>
					<td><label for="theme">Website Theme: </label></td>
					<td>
						<select name="themes" id="themes">
							<option value="light">Light</option>
							<option value="dark">Dark</option>
						</select>
					</td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Update Site Theme">
			<br>
			<h3>Account Settings</h3>
			<form>
				<fieldset>
					<legend onclick="personaltab()">Personal Information &#9660;</legend>
									
						<table id="personaltab">
						<tr>
							<td><label for="fname">First Name: </label></td>
							<td><input type="text" minlength="1" required placeholder="First Name" name="fname" /></td>
						</tr>
						<tr>
							<td><label for="lname">Last Name: </label></td>
							<td><input type="text" minlength="1" required placeholder="Last Name" name="lname" /><br></td>
						</tr>
					</table>
					
								</fieldset>
				<br>
				<fieldset>
					<legend  onclick="contacttab()">Contact Information &#9660;</legend>
					<table  id="contacttab">
						<tr>
							<td><label for="email">Email Address: </label></td>
							<td><input type="text" minlength="6" required placeholder="Email Address" name="email" /><br></td>
						</tr>
						<tr>
							<td><label for="phone">Phone Number: </label></td>
							<td><input type="text" minlength="10" maxlength="14" required placeholder="Phone Number" name="phone" /><br></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<legend  onclick="addresstab()">Address &#9660;</legend>
					<table  id="addresstab">
						<tr>
							<td><label for="saddr1">Street Address #1: </label></td>
							<td><input type="text" required placeholder="Address Line 1" name="saddr1" /><br></td>
						</tr>
						<tr>
							<td><label for="saddr2">Street Address #2: </label></td>
							<td><input type="text" required placeholder="Address Line 2" name="saddr2" /><br></td>
						</tr>
						<tr>
							<td><label for="city">City: </label></td>
							<td><input type="text" required placeholder="City" name="city" /></td>
						</tr>
						<tr>
							<td><label for="state">State: </label></td>
							<td>
								<input list="states" required placeholder="Select from list" id="state" name="state" />
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
							<td><label for="zipcode">Zipcode: </label></td>
							<td><input type="text" required placeholder="Postal Code" minlength="5" maxlength="10" ame="zipcode" /><br></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<legend  onclick="logintab()">Login Information &#9660;</legend>
					<table  id="logintab">
						<tr>
						<td><label for="pass">Old Password: </label></td>
						<td><input type="password" required placeholder="Password" name="pass" /><br></td>
						</tr>
						<tr>
							<td><label for="pass">New Password: </label></td>
							<td><input type="password" required placeholder="Password" name="pass" /><br></td>
						</tr>
						<tr>
							<td><label for="pass">Confirm New Password: </label></td>
							<td><input type="password" required placeholder="Password" name="pass" /><br></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<table class="fixed">
					<col width="100px" />
					<col width="80%" />
					<col width="100px" />
					<tr>
						<td><input type="submit" value="Update Account Information"></td>
						<td />
						<td><input type="button" style="background-color:darkred; color:white" value="Cancel Account"></td>
					</tr>
				</table>
			</form>

			<h3>Site Settings</h3>
			<input type="checkbox" id="unitycompatible" name="unitycompatible" value="Unity" />
			<label for="unitycompatible">Only display assets that are compatible with <b>Unity</b></label><br>
			<input type="checkbox" id="unrealcompatible" name="unrealcompatible" value="Unreal" />
			<label for="unrealcompatible">Only display assets that are compatible with <b>Unreal</b></label><br>
			<input type="checkbox" id="cryenginecompatible" name="cryenginecompatible" value="CryEngine" />
			<label for="cryenginecompatible">Only display assets that are compatible with <b>CryEngine</b></label><br>
			<br>
			<input type="submit" value="Update Site Preferences">
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>
