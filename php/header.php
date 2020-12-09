<div class="header" style="background-color:#e3eeff">
	<?php include "../php/theme.php" ?>
	<table class="fixed" width="100%">
		<col width="50%">
		<col width="38%">
		<col width="12%">
		<tr>
			<td>
				<table>
					<colgroup>
						<col width="10px"/>
						<col width="200px"/>
						<col width="100px"/>
						<col width="100px"/>
						<col width="100px"/>
					</colgroup>
					<tbody>
					<tr>
						<td></td>
						<script language="javascript">
							<!--
							var currentUrl = window.location.href;
							var urlParsed = currentUrl.split('/');
							var pageName = urlParsed[(urlParsed.length - 1)].split('.')[0];
							var path = ".";
							var logg = <?php echo $logged; ?>;
							if (pageName.toUpperCase()=="INDEX")
							{
								path="./php";
								document.write("<td><a href=\"./index.php\"><img class=\"buttonOut\" src=\"media/img/icon.png\" width=\"175\" height=\"50\"></a></td></td>");
							}
							else
							{
								document.write("<td><a href=\"../index.php\"><img class=\"buttonOut\" src=\"../media/img/icon.png\" width=\"175\" height=\"50\"></a></td></td>");
							}
							
							if (pageName.toUpperCase()=="ABOUT")
							{
								document.write("<td class=\"buttonOut\" style=\"border:1px solid black;border-collapse:collapse;text-align:center;background-color:lightgrey\">About</td>");
							}
							else
							{
								document.write("<td class=\"buttonOut\" style=\"border:1px solid black;border-collapse:collapse;text-align:center;background-color:lightblue\"><a href=\"" + path + "/about.php\">About</a></td>");
							}
							if(logg === 0) { 
								//alert("ohla");
							}
							else {
							if (pageName.toUpperCase()=="SETTINGS")
							{
								document.write("<td class=\"buttonOut\" style=\"border:1px solid black;border-collapse:collapse;text-align:center;background-color:lightgrey\">Settings</td>");
							}
							else
							{
								document.write("<td class=\"buttonOut\" style=\"border:1px solid black;border-collapse:collapse;text-align:center;background-color:lightblue\"><a href=\"" + path + "/settings.php\">Settings</a></td>");
							}
							}
							
							if (pageName.toUpperCase()=="FAQ")
							{
								document.write("<td class=\"buttonOut\" style=\"border:1px solid black;border-collapse:collapse;text-align:center;background-color:lightgrey\">FAQ</td>");
							}
							else
							{
								document.write("<td class=\"buttonOut\" style=\"border:1px solid black;border-collapse:collapse;text-align:center;background-color:lightblue\"><a href=\"" + path + "/faq.php\">FAQ</a></td>");
							}
							-->
						</script>
					</tr>
				</table>
			</td>
			<td></td>
			<td>
				<table>
					<colgroup>
						<col width="55px"/>
						<col width="55px"/>
						<col width="55px"/>
					</colgroup>
					<tbody>
						<tr align="center">
							<?php
								$cart = "";
								
								if (isset($_COOKIE['cart']))
								{
									$cart = $_COOKIE['cart'];
								}
								
								$filename = strtoupper(explode(".", basename($_SERVER['SCRIPT_FILENAME']))[0]);
								
								$path = ".";
								$image = "..";
								
								if ($filename == "INDEX")
								{
									$path = "./php";
									$image = ".";
								}
								
								/* SEARCH */
								echo "<td align=\"center\" class=\"buttonOut\"><a href=\"$path/search.php\"><img src=\"$image/media/img/search.png\" width=\"30\" height=\"30\" style=\"background-color:#e3eeff;\"></a></td>";
								
								/* CART */
								echo "<td align=\"center\" class=\"buttonOut dropdown\"><button class=\"dropbtn\">";
								echo "<a href=\"$path/payment.php\"><img src=\"$image/media/img/cart.png\" width=\"40\" height=\"40\" style=\"background-color:#e3eeff;\"></a>";
								echo "<div class=\"dropdown-content\">";
								
								$server='localhost';
								$user="brent";
								$password = "Student123!";
								$database = "Octocat";
								$connection = new mysqli($server, $user, $password, $database);
								
								$query = "SELECT productname, filesizemb, price FROM Product WHERE PRODUCT_ID in ($cart);";
								$result = $connection->query($query);
								$nada = is_null(mysqli_num_rows($result));
								
								echo "<br>";
								if ($nada)
								{
									echo "0 items<br>";
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
										
										echo "$prod ($size MB), \${$price}<br>";
									}
									
									echo "<br><b>TOTAL ($totalsize MB), \${$totalprice}</b><br>";
								}
								
								echo "<br></div></button></td>";
								
								/* LOGIN */
								echo "<td align=\"center\" class=\"buttonOut\"><a href=\"$path/login.php\"><img src=\"$image/media/img/login.png\" width=\"30\" height=\"30\" style=\"background-color:#e3eeff;\"></a></td>";
								
								$connection->close();
							?>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</table>
</div>
<br>
