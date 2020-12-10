<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/storefront.css">
		<script language="javascript" src="../js/cart.js"></script>
		<?php include "../php/theme.php" ?>
	</head>
	<body>
		<?php include "../php/header.php" ?>
		<br>
		<div class="<?php echo ($theme_id); ?>">
			<div class="row">
				<form style="width:40%">
					<fieldset>
						<legend>Address &#9660;</legend>
						<table>
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
								<td><input type="text" required placeholder="Postal Code" minlength="5" maxlength="10" ame="zipcode" /><br></td>
							</tr>
						</table>
					</fieldset>
					<br>
					<fieldset>
						<legend>Payment Information &#9660;</legend>
						<table>
							<tr>
								<td><label for="pass">Name on card: </label></td>
								<td><input type="text" required placeholder="John Doe" name="ccname" /><br></td>
							</tr>
							<tr>
								<td><label for="pass">Card number: </label></td>
								<td><input type="text" required placeholder="1234 1234 1234 1234" name="ccnum" /><br></td>
							</tr>
							<tr>
								<td><label for="pass">Expiration date: </label></td>
								<td><input type="date" required placeholder="12/99" name="ccexp" /><br></td>
							</tr>
							<tr>
								<td><label for="pass">CVV code: </label></td>
								<td><input type="text" required placeholder="000" name="cccvv" /><br></td>
							</tr>
						</table>
					</fieldset>
				</form>
				<br>
				<div class="col-25">
					<form style="width:50%">
						<fieldset>
							<legend>Shopping Cart &#9660;</legend>
							<table>
								<col width="61%" /><col width="27%" /><col width="12%" />
								<tr>
									<td><b>Product</b></td>
									<td><b>Size (MB)</b></td>
									<td><b>Price</b></td>
								</tr>
								<?php
									$cart = "";
									
									if (isset($_COOKIE['cart']))
									{
										$cart = $_COOKIE['cart'];
									}
									
									$server='localhost';
									$user="brent";
									$password = "Student123!";
									$database = "Octocat";
									$connection = new mysqli($server, $user, $password, $database);
									
									$query = "SELECT productname, filesizemb, price FROM Product WHERE PRODUCT_ID in ($cart);";
									$result = $connection->query($query);
									$nada = is_null(mysqli_num_rows($result));
									
									if ($nada)
									{
										echo "<tr><td>0 items</td></tr>";
									}
									else
									{
										$totalsize = 0;
										$totalprice = 0.00;
										
										while($record = $result->fetch_assoc())
										{
											$prod = $record['productname'];
											$price = $record["price"];
											$size = $record["filesizemb"];
											
											$totalsize += $size;
											$totalprice += $price;
											
											echo "<tr><td>$prod</td><td>$size</td><td>\${$price}</td></tr>";
										}
										
										echo "<tr><td><b>TOTAL</b></td><td><b>$totalsize</b></td><td><b>\${$totalprice}</b></td></tr>";
									}
									
									echo "</div></button></td>";
																				
									$connection->close();
								?>
							</table>
						</fieldset>
						<br>
						<input type="submit" style="background-color:limegreen;width:250px" value="Submit order">
					</form>
				</div>
			</div>
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>
