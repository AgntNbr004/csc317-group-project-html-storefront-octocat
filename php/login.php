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
				<form action="loginsubmit.php" method="GET">
					<thead><h1>Customer Portal Login</h1></thead>
					<p>Please log in with your account below.</p>
					<table>
						<tr>
							<td><label for="uname">Username: </label></td>
							<td><input type="text" minlength="1" required placeholder="Username" name="uname" /></td>
						</tr>
						<tr>
							<td><label for="pass">Password: </label></td>
							<td><input type="password" minlength="1" required placeholder="Password" name="pass" /></td>
						</tr>
					</table>
					<br>
					<a href=./passwordReset.php>Password Reset</a>
					<br>
					<a href=./register.php>Create new account</a>
					<br>
					<br>
					<input type="submit" class="buttonOut"  value="Login">
				</form>
			</center>
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>
