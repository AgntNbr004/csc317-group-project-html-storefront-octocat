<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</Title>
		<link rel="stylesheet" href="../css/storefront.css">
		<script language="javascript" src="../js/cart.js"></script>
		<?php include "../php/theme.php" ?>
	</head>
	<body>
		<?php include "../php/header.php" ?>
		<br>
		<div class="<?php echo ($theme_id); ?>">
			<center>
				<form action="passwordResetUpdate.php" method="GET">
					<thead><h1>Reset Your Password!</h1></thead>
					<p>Please fill in the correct account information.</p>
					<table>
						<tr>
							<td><label for="uname">Username: </label></td>
							<td><input type="text" minlength="1" required placeholder="Username" name="uname" /></td>
						</tr>
						<tr>
							<td><label for="email">Email: </label></td>
							<td><input type="email" minlength="1" required placeholder="Email" name="email" /></td>
						</tr>
						<tr>
							<td><label for="bdate">Birth date: </label></td>
							<td><input type="date" name="bdate" /><br></td>
						</tr>
						<tr>
							<td><label for="pass">Password: </label></td>
							<td><input type="password" minlength="1" required placeholder="Password" name="pass" /></td>
						</tr>
						<tr>
							<td><label for="conpass">Confirm Password: </label></td>
							<td><input type="password" minlength="1" required placeholder="Password" name="conpass" /></td>
						</tr>


					</table>
					<br>
					<a href=./login.php>Log In</a>
					<br>
					<a href=./register.php>Create new account</a>
					<br>
					<br>
					<input type="submit" class="buttonOut"  value="Reset">
				</form>
			</center>
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>
