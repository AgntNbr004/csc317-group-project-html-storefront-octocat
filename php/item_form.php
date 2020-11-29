<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</Title>
		<link rel="stylesheet" href="../css/item_form.css">
		<link rel="stylesheet" href="../css/storefront.css">
		<script language="javascript" src="../js/cart.js"></script>
		<script language="javascript" src="../js/magnify.js"></script>
	</head>
	<body>
		<?php include "../php/header.php" ?>
		<br>
		<div class="bodywrap">
			<center>
				<table>
					<tr>
						<?php
							if(isset($_GET['pid']))
							{
								$pid = htmlentities($_GET['pid']);
								
								$user="brent";
								$password = "Student123!";
								$database = "Octocat";
								$connection = new mysqli($server, $user, $password, $database);
								
								$query = "SELECT * FROM Product WHERE PRODUCT_ID=$pid;";
								$result = $connection->query($query);
								$count = mysqli_num_rows($result);
								
								while($record = $result->fetch_assoc())
								{
									$id = $record['PRODUCT_ID'];
									$prod = $record['productname'];
									$desc = $record["description"];
									$price = $record["price"];
									$size = $record["filesizemb"];
									$tris = $record["triangles"];
									$verts = $record["vertices"];
									$rigg = $record["rigged"]? 'Yes': 'No';
									$anim = $record["animated"]? 'Yes': 'No';
									$loc = $record["imagelocation"];
									
									echo "<td><div><td class=\"img-magnifier-container\" width=\"520\" height=\"400\"/><img id=\"itemimg\" src=\"../$loc\" width=\"500\" height=\"500\"></td></div></td>";
									echo "<td><table width=\"400\" height=\"400\" style=\"border:1px solid black;border-collapse:collapse;background-color:#e3eeff;\">";
									echo "<tr><td style=\"border:1px solid black;border-collapse:collapse;padding:4px;\"><b>Description:</b><br>$desc<br></td></tr>";
									echo "<tr><td style=\"border:1px solid black;border-collapse:collapse;padding:4px;\"><b>File Size (MB):</b><br>$size<br></td></tr>";
									echo "<tr><td style=\"border:1px solid black;border-collapse:collapse;padding:4px;\"><b>Triangles:</b><br>$tris<br></td></tr>";
									echo "<tr><td style=\"border:1px solid black;border-collapse:collapse;padding:4px;\"><b>Rigged:</b><br>$rigg<br></td></tr>";
									echo "<tr><td style=\"border:1px solid black;border-collapse:collapse;padding:4px;\"><b>Animated:</b><br>$anim<br></td></tr>";
									echo "<tr><td style=\"border:1px solid black;border-collapse:collapse;padding:4px;\"><b>Price:</b><br>\${$price}<br></td></tr>";
									echo "<tr><td style=\"border:1px solid black;border-collapse:collapse;padding:4px;\">";
									echo "<img class=\"buttonIn\" width=\"300\" name=\"submit\" onClick=\"updateCookie('cart', $id)\" src=\"../media/img/add_to_cart.png\"></td></tr>";
									echo "</table></td>";
								}
								
								$result->free();
								$connection->close();
							}
						?>
					</tr>
				</table>
			</center>
		</div>
		<br>
		<script>
			magnify("itemimg", 3);
		</script>
		<?php include "../html/footer.html" ?>
	</body>
</html>
