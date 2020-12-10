<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</Title>
		<link rel="stylesheet" href="../css/storefront.css">
		<script language="javascript" src="../js/cart.js"></script>
		<?php include "../php/theme.php" ?>
		<?php include "../php/loginsubmit.php" ?>
	</head>
	<body>
		<?php include "../php/header.php" ?>
		<br>
		<div class="<?php echo ($theme_id); ?>">
			<center>
				<?php
					if(array_key_exists('login', $_POST)) { 
						login($_POST["uname"], $_POST["pass"]);
					} 
					else if(array_key_exists('logout', $_POST)) {
						logout();
					}
				?>
				<form method="post">
					<thead><h1>Customer Portal Login</h1></thead>
					<p>Please log in with your account below.</p>
					<table>
						<tr>
							<td><label for="uname">Username: </label></td>
							<td><input type="text" minlength="1" <?php if(!isset($_SESSION["UserID"])) {echo "required";} ?> placeholder="Username" name="uname" /></td>
						</tr>
						<tr>
							<td><label for="pass">Password: </label></td>
							<td><input type="password" minlength="1" <?php if(!isset($_SESSION["UserID"])) {echo "required";} ?> placeholder="Password" name="pass" /></td>
						</tr>
					</table>
					<br>
					<a href=./passwordReset.php>Password Reset</a>
					<br>
					<a href=./register.php>Create new account</a>
					<br>
					<br>
					<?php
						if(isset($_SESSION["UserID"])) {
							echo "<input name=\"logout\" style=\"width=100px;\" type=\"submit\" class=\"buttonOut\" value=\"Log Out\">";
						} else {
							echo "<input name=\"login\" style=\"width=100px;\" type=\"submit\" class=\"buttonOut\" value=\"Log In\">";
						}
					?>
				</form>
			</center>
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>
